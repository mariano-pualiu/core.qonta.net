<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Helpers;

use Architecture\XmlSchemator\Builders\Enums\StringFormatEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

final class TransformerBuilder
{
    const SHORT_INDENT = '    ';
    const LONG_INDENT = '        ';

    /**
     * Relative path for the stubs (relative to this directory / file)
     *
     * @var string
     */
    private const STUB_PATH = 'vendor/apiato/core/Generator/Stubs/*';

    /**
     * Relative path for the custom stubs (relative to the app/Ship directory!
     */
    private const CUSTOM_STUB_PATH = 'Generators/CustomStubs/*';

    protected static string $stubPath = 'model';

    protected Collection $fillable;
    protected Collection $casts;
    protected Collection $deserializers;
    protected Collection $relationships;
    protected Collection $namespaces;

    public function __construct(
        ?array $fillable = [],
        ?array $casts = [],
        ?array $deserializers = [],
        ?array $relationships = [],
        ?array $namespaces = [],
    ) {
        $this->namespaces = collect($namespaces);
        $this->fillable = collect($fillable);
        $this->casts = collect($casts);
        $this->deserializers = collect($deserializers);
        $this->relationships = collect($relationships);
    }

    public function dump()
    {
        dump($this);

        return $this;
    }

    public function dd()
    {
        dd($this);
    }

    public function __get(string $propertyName)
    {
        $propertyName = Str::of($propertyName)
            ->whenIs('*Code', fn($propertyName) => $propertyName->before('Code'))->toString();

        return match ($propertyName) {
            'namespaces' => self::formatNamespacesCode($this->$propertyName),
            'fillable',
            'casts',
            'deserializers',
            'relationships' => self::getFormattedPropertyCode($propertyName, $this->$propertyName),
            default => $this->$propertyName,
        };
    }

    protected static function getFormattedPropertyCode($propertyName, $propertyContent)
    {
        $stubContent = self::getStubContent("transfromer/{$propertyName}.stub");

        $propertyCode = match ($propertyName) {
            'relationships' => self::formatRelationshipsCode($propertyContent),
            'fillable' => Str::of(varexport($propertyContent->toArray(), true))
                ->replace('\\\\', '\\')
                ->pipe(fn($properties) => Str::of(preg_replace('/[0-9]+ => /', '', $properties->toString())))
                ->replace(PHP_EOL, PHP_EOL . self::SHORT_INDENT),
            'casts',
            'deserializers' => Str::of(varexport($propertyContent->toArray(), true))
                ->replace('\\\\', '\\')
                ->replace(["' => '", "',"], ["' => ", ","])
                ->replace(PHP_EOL, PHP_EOL . self::SHORT_INDENT),
            default => null
        };

        return self::parseStubContent($stubContent, ["{$propertyName}" => $propertyCode]);
    }

    public static function fromContextInput(Collection $contextInput): self
    {
        $attributes = collect($contextInput['attributes']->present()->fromJsonFormat(true));

        $methods = $contextInput->get('methods')->asFormat(StringFormatEnum::STRING_ARRAY);
        $namespaces = $contextInput->get('namespaces')->asFormat(StringFormatEnum::STRING_ARRAY);

        return (new self(
            fillable: $attributes->keys()->toArray(),
            casts: self::castsFromContextInput($contextInput)->toArray(),
            deserializers: self::deserializersFromContextInput($contextInput)->toArray(),
            relationships: Arr::get($methods, 'relationships'),
            namespaces: $namespaces
        ));
    }

    protected static function castsFromContextInput(Collection $contextInput): Collection
    {
        $attributes = collect($contextInput['attributes']->present()->fromJsonFormat(true));

        return $attributes
            ->mapWithKeys(function ($attributeFields, $attributeName) {
                $namespace = Str::of(Arr::get($attributeFields, 'classNamespacePath'))
                    ->beforeLast('/')
                    ->afterLast('/')
                    ->append('Attributes')
                    ->replace('/', '\\');

                return [
                    (string) $attributeName => "{$namespace}\\{$attributeName}Attribute::class"
                ];
            });
    }

    protected static function deserializersFromContextInput(Collection $contextInput): Collection
    {
        $elementProperties = $contextInput->get('properties')->asFormat(StringFormatEnum::STRING_ARRAY);

        $model = $contextInput->get('model')->present()->asOriginalFormat()->toString();

        return collect(Arr::get($elementProperties, 'deserializers'))
            ->reduce(function ($carry, $deserializers, $xsdNamespace) use ($model) {
                // $maxLength = null;
                $deserializers = collect($deserializers)
                    ->keyBy(fn($deserializerClass, $attributeName) => self::fullClarkElementName($deserializerClass, $xsdNamespace))
                    ->mapWithKeys(
                        fn($qualifiedClassConstant, $elementName) =>
                        [Str::of($elementName)->toString() => $qualifiedClassConstant]
                    )
                    ->toArray();

                return $carry->merge($deserializers);
            }, collect([]));
    }

    protected static function fullClarkElementName($qualifiedClassName, $xsdNamespace)
    {
        return Str::of($qualifiedClassName)        // App\Containers\Sat\Cfdi\Models\V33\Comprobante\CfdiRelacionados::class
            ->afterLast('\\')                           // CfdiRelacionados::class
            ->before('::class')                         // CfdiRelacionados
            ->start("{{$xsdNamespace}}");               // {http://www.sat.gob.mx/cfd/3}CfdiRelacionados
    }

    // protected function decodeMethods(Collection $contextInput)
    // {
    //     $methodsTypes = $contextInput->get('methods')->asFormat(StringFormatEnum::STRING_ARRAY);
    //     // dump(Arr::get($this->contextInput, 'methods'), $methodsTypes);
    //     return collect($methodsTypes)
    //         ->reduce(function ($carry, $methods, $methodsType) {
    //             switch ($methodsType) {
    //                 case 'relationships':
    //                     return $carry . $this->buildRelationshipsMethods($methods, $methodsType);
    //             }

    //             return $carry;
    //         }, '');
    // }

    protected static function formatRelationshipsCode(Collection $relationships)
    {
        $relationshipsCode = $relationships
            ->map(function ($relationships, $relationshipType) {
                $relationshipType = Str::camel($relationshipType);

                return collect($relationships)
                    ->map(function ($arguments, $entity) use ($relationshipType) {
                        $arguments = collect($arguments);

                        $methodName = Str::camel($entity);

                        $qualifiedClassConstant = $arguments->shift();

                        $arguments = $arguments->when(
                            $arguments->isNotEmpty(),
                            fn($arguments) => Str::of($arguments->map(fn($argument) => "'{$argument}'")->implode(', '))->start($className . ', '),
                            fn($arguments) => $qualifiedClassConstant
                        );

                        $methodCode = self::SHORT_INDENT
                            . collect([
                                "#[IsRelationshipMethod(relatedModel: {$qualifiedClassConstant}, relationshipType: '{$relationshipType}')]",
                                "final public function {$methodName}()",
                                "{",
                                self::SHORT_INDENT . "return \$this->{$relationshipType}({$arguments});",
                                "}",
                            ])
                                ->implode(PHP_EOL . self::SHORT_INDENT);
                        return $methodCode;
                    })
                    ->implode(PHP_EOL . PHP_EOL);
            })->implode(PHP_EOL . PHP_EOL);

        return Str::of($relationshipsCode);
    }

    protected static function formatNamespacesCode(Collection $namespaces)
    {
        $namespacesCode = $namespaces
            ->map(
                fn($namespaceAlias, $namespace) =>
                Str::of($namespace)
                    ->prepend('use ')
                    ->when(
                        !Str::endsWith($namespace, $namespaceAlias),
                        fn($namespace) => $namespace->append(' as ' . $namespaceAlias)
                    )
                    ->finish(';')
                    ->toString()
            )
            ->implode(PHP_EOL);

        return Str::of($namespacesCode);
    }

    /**
     * @return  mixed
     * @throws FileNotFoundException
     */
    protected static function getStubContent(string $stubName = null)
    {
        // Check if there is a custom file that overrides the default stubs
        $path = dirname(__DIR__, 3) . '/' . self::CUSTOM_STUB_PATH;
        $file = str_replace('*', $stubName, $path);
        // dd($file, file_exists($file));
        // Check if the custom file exists
        if (!file_exists($file)) {
            // It does not exist - so take the default file!
            $path = base_path(self::STUB_PATH);
            $file = str_replace('*', $stubName, $path);
        }

        // Now load the stub
        return file_get_contents($file);
    }

    /**
     * replaces the variables in the stub file with defined values
     *
     * @param $stub
     * @param $data
     *
     * @return string|array
     */
    protected static function parseStubContent($stub, $data): string|array
    {
        return str_replace(
            array_map(fn($key) => '{{' . $key . '}}', array_keys($data)),
            array_values($data),
            $stub
        );
    }

}
