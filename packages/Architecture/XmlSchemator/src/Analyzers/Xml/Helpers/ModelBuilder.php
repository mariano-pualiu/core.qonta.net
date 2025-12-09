<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Helpers;

use Architecture\XmlSchemator\Builders\Enums\StringFormatEnum;
use Architecture\XmlSchemator\Providers\MainServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

final class ModelBuilder
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
     * Relative path for the custom stubs (relative to the app/Architecture/XmlSchemator directory!
     */
    private const CUSTOM_STUB_PATH = 'Generators/CustomStubs/*';

    protected static string $stubPath = 'model';

    protected Collection $fillable;
    protected Collection $casts;
    protected Collection $deserializers;
    protected Collection $relationships;
    protected Collection $namespaces;
    protected Collection $implements;
    protected Collection $traits;

    public function __construct(
        ?array $fillable = [],
        ?array $casts = [],
        ?array $deserializers = [],
        ?array $relationships = [],
        ?array $namespaces = [],
        ?array $implements = [],
        ?array $traits = [],
    )
    {
        $this->fillable      = collect($fillable);
        $this->casts         = collect($casts);
        $this->deserializers = collect($deserializers);
        $this->relationships = collect($relationships);
        $this->namespaces    = collect($namespaces);
        $this->implements    = collect($implements);
        $this->traits        = collect($traits);
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
            ->whenIs('*Code', fn ($propertyName) => $propertyName->before('Code'))->toString();

        return match ($propertyName) {
            'namespaces'    => Self::formatNamespacesCode(
                $this->namespaces,
                $this->implements,
                $this->traits,
                $this->relationships
            ),
            'implements'    => Self::formatImplementsCode($this->implements),
            'traits'        => Self::formatTraitsCode($this->traits),
            'fillable'      => Self::getFormattedPropertyCode($propertyName, $this->fillable),
            'casts'         => Self::getFormattedPropertyCode($propertyName, $this->casts),
            'deserializers' => Self::getFormattedPropertyCode($propertyName, $this->deserializers),
            'relationships' => Self::getFormattedPropertyCode($propertyName, $this->relationships),
            default         => $this->$propertyName,
        };
    }

    public static function getDbCollectionName(Collection $contextInput)
    {
        // dump($contextInput->get('xsd-version-number'));
        // dd($contextInput);
        return $contextInput
            ->only(['section', 'container', 'collection', 'xsd-version-number'])
            ->map(fn ($input) => $input->present()->asSnakeFormat()->toString())
            ->implode('_');
    }

    protected static function getFormattedPropertyCode($propertyName, $propertyContent)
    {
        $stubContent = Self::getStubContent("model/{$propertyName}.stub");

        $propertyCode = match ($propertyName) {
            'relationships' => Self::formatRelationshipsCode($propertyContent),
            'fillable' => Str::of(varexport($propertyContent->toArray(), true))
                ->replace('\\\\', '\\')
                ->pipe(fn ($properties) => Str::of(preg_replace('/[0-9]+ => /', '', $properties->toString())))
                ->replace(PHP_EOL, PHP_EOL . Self::SHORT_INDENT),
            'casts',
            'deserializers' => Str::of(varexport($propertyContent->toArray(), true))
                ->replace('\\\\', '\\')
                ->replace(["' => '", "',"], ["' => ", ","])
                ->replace(PHP_EOL, PHP_EOL . Self::SHORT_INDENT),
            // 'transformer_attributes' => ,
            default => null
        };

        return Self::parseStubContent($stubContent, ["{$propertyName}" => $propertyCode]);
    }

    public static function fromContextInput(Collection $contextInput): Self
    {
        $attributes = collect($contextInput['attributes']->present()->fromJsonFormat(true));

        $properties = $contextInput->get('properties')->asFormat(StringFormatEnum::STRING_ARRAY);
        $methods    = $contextInput->get('methods')->asFormat(StringFormatEnum::STRING_ARRAY);
        $namespaces = $contextInput->get('namespaces')->asFormat(StringFormatEnum::STRING_ARRAY);
        $implements = $contextInput->get('implements')->asFormat(StringFormatEnum::STRING_ARRAY);
        $traits     = $contextInput->get('traits')->asFormat(StringFormatEnum::STRING_ARRAY);

        return (new Self(
            fillable: Self::fillablesFromContextInput($properties, $attributes)->toArray(),
            casts: Self::castsFromContextInput($contextInput)->toArray(),
            deserializers: Self::deserializersFromContextInput($contextInput)->toArray(),
            relationships: Arr::get($methods, 'relationships'),
            namespaces: $namespaces,
            implements: $implements,
            traits: $traits,
        ));
    }

    protected static function castsFromContextInput(Collection $contextInput): Collection
    {
        $parent = collect($contextInput['parent']->present()->fromJsonFormat(true));
        $attributes = collect($contextInput['attributes']->present()->fromJsonFormat(true));
        $namespaces = collect($contextInput['namespaces']->present()->fromJsonFormat(true));
        $properties = $contextInput->get('properties')->asFormat(StringFormatEnum::STRING_ARRAY);

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
            })
            ->merge(Arr::get($properties, 'casts'))
            ->when(is_null(Arr::get($parent, 'classNamespacePath')) && $namespaces->contains('NamespacesCast'), function ($attributes) {
                $attributes->prepend('NamespacesCast::class', 'Namespaces');
            })
            ;
    }

    protected static function deserializersFromContextInput(Collection $contextInput): Collection
    {
        $elementProperties = $contextInput->get('properties')->asFormat(StringFormatEnum::STRING_ARRAY);

        $model = $contextInput->get('model')->present()->asOriginalFormat()->toString();

        return collect(Arr::get($elementProperties, 'deserializers'))
            ->reduce(function ($carry, $deserializers, $xsdNamespace) use ($model) {
                // $maxLength = null;
                $deserializers = collect($deserializers)
                    ->keyBy(fn ($deserializerClass, $attributeName) => Self::fullClarkElementName($deserializerClass, $xsdNamespace))
                    ->mapWithKeys(fn ($qualifiedClassConstant, $elementName) =>
                        [Str::of($elementName)->toString() => $qualifiedClassConstant]
                    )
                    ->toArray();

                return $carry->merge($deserializers);
            }, collect([]));
    }

    protected static function fillablesFromContextInput(array $properties, Collection $attributes): Collection
    {
        return collect(Arr::get($properties, 'fillable'))->merge($attributes->keys());
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
    //             return match ($methodsType) {
    //                  'relationships' => $carry . $this->buildRelationshipsMethods($methods, $methodsType),
    //                  default => $carry,
    //              };
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
                        // dump($arguments);

                        $methodName = Str::camel($entity);

                        $qualifiedClassConstants = $arguments->first();
                        $relationshipMethodDefinition = $arguments->get(1);
                        // dd($qualifiedClassConstants, $relationshipMethodDefinition);
                        // $arguments = $arguments->when(
                        //     $arguments->isNotEmpty(),
                        //     fn ($arguments) => Str::of($arguments->map(fn ($argument) => "'{$argument}'")->implode(', '))->start($className.', '),
                        //     fn ($arguments) => $qualifiedClassConstants
                        // );

                        $relationshipReturnType = Str::of($relationshipType)->afterLast('\\');

                        $relationshipTypeName = $relationshipReturnType->camel();

                        $qualifiedClass = collect($qualifiedClassConstants)
                            ->map(fn ($qualifiedClassConstant) => Str::of($qualifiedClassConstant)->beforeLast('::'))
                            ->implode('|');

                        $methodCode = Self::SHORT_INDENT
                            . collect([
                                // "#[IsRelationshipMethod(relatedModel: {$qualifiedClassConstant})]",
                                "final public function {$methodName}({$qualifiedClass} \${$methodName} = null): {$relationshipReturnType}",
                                "{",
                                Self::SHORT_INDENT . (
                                    $arguments->has(1)
                                        ? $arguments->get(1)
                                        : "return \$this->{$relationshipTypeName}({$arguments->get(0)});"
                                ),
                                "}",
                            ])
                            ->implode(PHP_EOL . Self::SHORT_INDENT);
                        return $methodCode;
                    })
                    ->implode(PHP_EOL . PHP_EOL);
            })->implode(PHP_EOL . PHP_EOL);

        return Str::of($relationshipsCode);
    }

    protected static function formatNamespacesCode(
        Collection $namespaces,
        Collection $implements = null,
        Collection $traits = null,
        Collection $relationships = null,
    )
    {
        $namespacesCode = $namespaces
            ->when(!empty($implements), function ($namespaces) use ($implements) {
                return $namespaces->merge($implements);
            })
            ->when(!empty($traits), function ($namespaces) use ($traits) {
                return $namespaces->merge($traits);
            })
            ->when(!empty($relationships), function ($namespaces) use ($relationships) {
                return $namespaces->merge($relationships
                    ->mapWithKeys(fn ($relationship, $relationshipName)
                        => [$relationshipName => Str::of($relationshipName)->afterLast('\\')->toString()]
                    ));
            })
            ->map(fn ($namespaceAlias, $namespace) =>
                Str::of($namespace)
                    ->prepend('use ')
                    ->when(
                        !is_array($namespaceAlias),
                        fn ($namespace) => $namespace->when(
                            !Str::endsWith($namespace, $namespaceAlias),
                            fn ($namespace) => $namespace->append(' as ' . $namespaceAlias)
                        ),
                    )
                    ->finish(';')
                    ->toString()
            )
            ->implode(PHP_EOL);

        return Str::of($namespacesCode);
    }

    protected static function formatTraitsCode(Collection $traits)
    {
        $traitsCode = $traits
            ->map(function ($traitAlias, $trait) {
                return Str::of(collect($traitAlias)->implode(', '))
                    ->prepend('use ')
                    ->finish(';');
            })
            ->implode(PHP_EOL . Self::SHORT_INDENT);

        return Str::of($traitsCode)
            ->whenNotEmpty(fn ($traitsCode)
                => $traitsCode->prepend(PHP_EOL . Self::SHORT_INDENT)->finish(PHP_EOL)
            );
    }

    protected static function formatImplementsCode(Collection $implements)
    {
        return Str::of($implements->implode(', '))
            ->whenNotEmpty(fn (Stringable $string) => $string->prepend(' implements '));
    }

    /**
     * @return  mixed
     * @throws FileNotFoundException
     */
    protected static function getStubContent(string $stubName = null)
    {
        $containerPath = MainServiceProvider::getSectionContainerPath();
        // Check if there is a custom file that overrides the default stubs
        $path = $containerPath . DIRECTORY_SEPARATOR . Self::CUSTOM_STUB_PATH;
        $file = str_replace('*', $stubName, $path);
        // dd($file, file_exists($file));
        // Check if the custom file exists
        if (!file_exists($file)) {
            // It does not exist - so take the default file!
            $path = base_path(Self::STUB_PATH);
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
            array_map(fn ($key) => '{{' . $key . '}}', array_keys($data)),
            array_values($data),
            $stub
        );
    }

}
