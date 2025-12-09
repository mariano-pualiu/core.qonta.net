<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\OccursEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\UseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Helpers\NamespaceBuilder;
use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ElementNodeValueGenerator extends GeneratorCommand
{
    const FILE_TYPE     = 'ElementNodeValue';
    const SHORT_INDENT  = '    ';
    const LONG_INDENT   = '        ';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */

    public $inputs = [
        ['model', null, InputOption::VALUE_REQUIRED, 'The name of the Model'],
        ['collection', null, InputOption::VALUE_REQUIRED, 'The name of the Collection'],
        ['parent', null, InputOption::VALUE_REQUIRED, 'The parent element for the value to be aware of'],

        ['class-namespace-path', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        // ['xsd-namespace', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-version-number', null, InputOption::VALUE_REQUIRED, 'The simple container alias name, such as cfd, nomina, pagos, etc.'],

        ['elementNamespaces', null, InputOption::VALUE_REQUIRED, 'The elementNamespaces list for the value to be aware of'],
        ['annotation', null, InputOption::VALUE_OPTIONAL, 'The documentation annotation for the value to be aware of'],
        // ['properties', null, InputOption::VALUE_REQUIRED, 'The properties list for the value to be aware of'],
        ['attributes', null, InputOption::VALUE_REQUIRED, 'The attributes list for the value to be aware of'],
        ['elementAttributes', null, InputOption::VALUE_REQUIRED, 'The elementAttributes list for the value to be aware of'],
        ['elements', null, InputOption::VALUE_REQUIRED, 'The elements list for the value to be aware of'],
        ['elementElements', null, InputOption::VALUE_REQUIRED, 'The elementsElements list for the value to be aware of'],
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    // protected $name = 'core:generate:value:node:element';
    protected $name = 'core:xml:generate:value:node:element';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the new Element Node Value class';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'ElementNodeValue';
    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{SectionName}/{ContainerName}/Values/{VersionNumber}/Elements/{PathFolder}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{FileName}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'values/element_value.stub';

    /**
     * The list of attributes for the value to be created with.
     */
    protected string $attributesList = '';

    /**
     * The list of properties for the value to be created with.
     */
    protected string $propertiesList = '';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->printInfoMessage('Generating Element Node Value');

        $this->promptContextInput('class-namespace-path', 'The namespace value to be placed in');
        // $this->promptContextInput('xsd-namespace', 'The XSD namespace value to be placed in');
        $this->promptContextInput('xsd-version-number', 'The XSD namespace alias value');

        $this->promptContextInput('model', 'Enter the name of the Model');
        $this->promptContextInput('collection', 'Enter the name of the Collection');
        $this->promptContextInput('annotation', 'The annotation for the value to be aware of');
        $this->promptContextInput('parent', 'The parent element for the value to be aware of, json format');
        // $this->promptContextInput('properties', 'The properties list for the value to be aware of, json format');
        $this->promptContextInput('attributes', 'The attributes list for the value to be aware of, json format');
        $this->promptContextInput('elementAttributes', 'The elementAttributes list for the value to be aware of, json format');
        $this->promptContextInput('elementNamespaces', 'The elementNamespaces list for the value to be aware of, json format');
        $this->promptContextInput('elements', 'The elements list for the value to be aware of, json format');
        $this->promptContextInput('elementElements', 'The elementElements list for the value to be aware of, json format');

        // dump(__METHOD__, $this->contextInput->get('model'));
        $subNamespace = Str::of($this->contextInput['class-namespace-path']->stringValue->value)->beforeLast('/');

        // $baseNamespace = Arr::get($this->contextInput, 'namespace.name');
        $classAnnotation = $this->contextInput['annotation']->stringValue?->value;
        // $classAnnotation = Arr::get($this->contextInput, 'annotation.name');

        $classAttributes = Self::prepareAttributes($this->contextInput);
        // dump($classAttributes);
        // $classProperties = $this->prepareProperties();
        $classElements = $this->prepareElements($this->contextInput);
        // dd($classElements);
        // $classUseAttributesNamespace = $this->prepareUseAttributesNamespace();
        // $classArguments = $this->prepareArguments();
        // $classAssignations = $this->prepareAssignations();
        // $classSetters = $this->prepareSetters();

        // $enumsSubNamespace = Str::of($this->contextInput['class-namespace-path']->stringValue->value)
        //     ->finish('Enum')
        //     ->replace('/', '\\');

        $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);

        $baseNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asStudlyFormat(),
            container: $this->contextInput->get('container')->present()->asStudlyFormat(),
            context: 'Values',
            version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: Str::of(Arr::get($parent, 'classNamespacePath'))->replace('/', '\\')->prepend('\\Elements')
        );

        // $baseNamespace->dump();
        // dump($baseNamespace->getFullyQualifiedClassName());
        // dump([
        //     'model' => $this->contextInput['model']->stringValue,
        //     'path' => $this->contextInput['class-namespace-path']->stringValue,
        //     'subNamespace' => $subNamespace,
        //     'classUseAttributesNamespace' => $classUseAttributesNamespace,
        //     'enumsSubNamespace' => $enumsSubNamespace,
        // ]);

        $attributesNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asStudlyFormat(),
            container: $this->contextInput->get('container')->present()->asStudlyFormat(),
            context: 'Values',
            version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: $this->contextInput['class-namespace-path']->stringValue->replace('/', '\\')->prepend('\\Attributes')
        );

        // dd($attributesNamespace, $attributesNamespace->getFullyQualifiedClassName()
        //             ->append(' as ' . $attributesNamespace->getFormattedAliasName(['path' => fn ($path) => $path->afterLast('\\')->append('Attributes')])));

        // dump($attributesNamespace->getFullyQualifiedClassName());
        // $attributesNamespace->dd(); <q{1: cite=""}></q>

        $generatorParams = [
            'path-parameters' => [
                'SectionName'   => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName' => $this->contextInput->get('container')->present()->asStudlyFormat(),
                'VersionNumber' => $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
                'PathFolder'    => (string) $subNamespace->after('/'),
            ],
            'stub-parameters' => [
                'BaseNamespace'                => $baseNamespace->getFullyQualifiedClassName(),
                'AttributesNamespace'          => $attributesNamespace->getFullyQualifiedClassName()->append(' as ' . $attributesNamespace->getFormattedAliasName(['path' => fn ($path) => $path->afterLast('\\')->append('Attributes')])),
                'class:use-element-namespaces' => self::prepareAttributesNamespace($this->contextInput),

                'ClassName'                    => $this->contextInput->get('model')->present()->asStudlyFormat(),
                'class:attributes'             => $classAttributes,
                'class:annotation'             => $classAnnotation,
                'class:elements'               => $classElements,
            ],
            'file-parameters' => [
                'FileName'                       => $this->contextInput->get('model')->present()->asStudlyFormat(),
            ],
        ];

        $this->generateFiles($generatorParams);
    }

    protected static function prepareAttributesNamespace(Collection $contextInput): string
    {
        $elementNamespaces = collect($contextInput['elementNamespaces']->present()->fromJsonFormat(true))
            ->map(function ($namespaceAlias, $namespacePath) {
                return Str::of($namespacePath)
                ->whenEndsWith($namespaceAlias,
                    fn ($namespacePath) => $namespacePath,
                    fn ($namespacePath) => $namespacePath->append(' as ' . $namespaceAlias . ';')
                )
                ->prepend('use ')->toString();
            })
            ->values();

        return $elementNamespaces->implode(PHP_EOL) . ($elementNamespaces->count() > 0 ? PHP_EOL : '');
    }

    protected function prepareUseAttributesNamespace()
    {
        $elements = $this->contextInput['elements']->present()->fromJsonFormat(true);

        $elements = collect($elements)
            ->map(function ($itemNode, $nodeName) {
                $attributesNamespace = Str::of(Arr::get($itemNode, 'classNamespacePath'))->beforeLast('/');

                return $attributesNamespace
                    ->append(' as ' . $attributesNamespace->afterLast('/')->append('Elements'))
                    ->replace('/', '\\');
            })
            ->unique()
            ->values();

        $attributes = $this->contextInput['attributes']->present()->fromJsonFormat(true);

        $attributes = collect($attributes)
            ->map(function ($itemNode, $nodeName) {
                $attributesNamespace = Str::of(Arr::get($itemNode, 'classNamespacePath'))->beforeLast('/');

                return $attributesNamespace
                    ->append(' as ' . $attributesNamespace->afterLast('/')->append('Attributes'))
                    ->replace('/', '\\');
            })
            ->unique()
            ->values();

        return $attributes->implode(PHP_EOL) . ($attributes->count() > 0 ? PHP_EOL . PHP_EOL : '')
            . $elements->implode(PHP_EOL) . ($elements->count() > 0 ? PHP_EOL . PHP_EOL : '');
    }

    // protected function prepareProperties()
    // {
    //     $properties = $this->contextInput['properties']->present()->fromJsonFormat(true);

    //     return (count($properties) > 0 ? PHP_EOL . Self::LONG_INDENT : '') .
    //         collect([])
    //             ->when($name = Arr::get($properties, 'name'), function ($propertyCode) use ($name) {
    //                 return $propertyCode->push("public string \$name = '{$name}',");
    //             })
    //             ->when($minOccurs = Arr::get($properties, 'minOccurs'), function ($propertyCode) use ($minOccurs) {
    //                 return $propertyCode->push("public int \$minOccurs = {$minOccurs},");
    //             })
    //             ->when($maxOccurs = Arr::get($properties, 'maxOccurs'), function ($propertyCode) use ($maxOccurs) {
    //                 // $isMaxOccursUnbounded = OccursEnum::tryFrom($maxOccurs) === OccursEnum::UNBOUNDED;

    //                 return $propertyCode->push("public int|string \$maxOccurs = " . (is_numeric($maxOccurs) ? "{$maxOccurs}," : "'{$maxOccurs}',"));
    //             })
    //             ->implode(PHP_EOL . Self::LONG_INDENT) .
    //         (count($properties) > 0 ? PHP_EOL . Self::LONG_INDENT : '');
    // }

    protected function prepareElements(Collection $contextInput): string
    {
        $elements = $contextInput['elements']->present()->fromJsonFormat(true);
        // dd($elements);
        // $attributes = collect($contextInput['attributes']->present()->fromJsonFormat(true));

        $elements = collect($elements)
            ->map(function ($elementFields, $elementName) /*use ($elementName)*/ {
                    $elementName = Str::of($elementName)->studly();

                    $namespace = Str::of(Arr::get($elementFields, 'classNamespacePath'))
                        ->beforeLast('/')
                        ->afterLast('/')
                        ->append('Elements')
                        ->replace('/', '\\');

                    // $restrictions = Arr::get($elementFields, 'restrictions');

                    $minOccurs = Arr::get($elementFields, 'minOccurs', 1);
                    $maxOccurs = Arr::get($elementFields, 'maxOccurs', 1);
                    // $fixed = Arr::get($elementFields, 'attributes.fixed');
                    // $use = Arr::get($elementFields, 'attributes.use');

                    // $useOptional = UseEnum::tryFrom($use) === UseEnum::OPTIONAL;

                    // $useOptionalSymbol = ($useOptional  ? '?' : null);

                    // $isFixedValue = ($useOptional ? ' = ' . ($fixed ? $fixed : 'null') : null);

                    return collect([
                        // "#[WithCastable({$namespace}\\{$elementName}Element::class)]",
                        // "#[CFDIAttributeValidation({$elementName}Enum::{$elementName})]" . PHP_EOL . Self::LONG_INDENT,
                        // "protected {$useOptionalSymbol}{$namespace}\\{$elementName}Element \${$elementName}{$isFixedValue}",
                        "protected {$namespace}\\{$elementName}Element \${$elementName}",
                    ])
                    ->implode(PHP_EOL . Self::SHORT_INDENT);
                });

        return ($elements->count() > 0 ? PHP_EOL . Self::SHORT_INDENT : '') .
            $elements->implode(';' . PHP_EOL . Self::SHORT_INDENT) . ';' . PHP_EOL;

        // return ($elements->count() > 0 ? PHP_EOL . Self::LONG_INDENT : '') .
        //     $elements->map(function ($elementFields, $elementName) {
        //         $elementName = Str::studly($elementName);

        //         $namespace = Str::of(Arr::get($elementFields, 'namespace'))
        //             ->beforeLast('/')
        //             ->afterLast('/');

        //         return "public {$namespace}\\{$elementName}Element \${$elementName}";
        //     })
        //     ->implode(',' . PHP_EOL . Self::LONG_INDENT) .
        //     ($elements->count() > 0 ? ',' . PHP_EOL . Self::LONG_INDENT : '');
    }

    protected function prepareAttributes(Collection $contextInput)
    {
        $attributes = collect($contextInput['attributes']->present()->fromJsonFormat(true));
        $elementAttributes = collect($contextInput['elementAttributes']->present()->fromJsonFormat(true));
        // dd($attributes, $elementAttributes);
        // $elementName = Str::of($contextInput['class-namespace-path']->stringValue->value)->afterLast('/');

        $attributes = $elementAttributes
            ->merge($attributes
                ->map(function ($attributeFields, $attributeName) /*use ($elementName)*/ {
                    $attributeName = Str::of($attributeName)->studly();

                    $namespace = Str::of(Arr::get($attributeFields, 'classNamespacePath'))
                        ->beforeLast('/')
                        ->afterLast('/')
                        ->append('Attributes')
                        ->replace('/', '\\');

                    $restrictions = Arr::get($attributeFields, 'restrictions');

                    $fixed = Arr::get($attributeFields, 'attributes.fixed');
                    $use = Arr::get($attributeFields, 'attributes.use');

                    $useOptional = UseEnum::tryFrom($use) === UseEnum::OPTIONAL;

                    $useOptionalSymbol = ($useOptional  ? '?' : null);

                    $isFixedValue = ($useOptional ? ' = ' . ($fixed ? $fixed : 'null') : null);

                    return collect([
                        "#[WithCastable({$namespace}\\{$attributeName}Attribute::class)]",
                        // "#[CFDIAttributeValidation({$elementName}Enum::{$attributeName})]" . PHP_EOL . Self::LONG_INDENT,
                        "public {$useOptionalSymbol}{$namespace}\\{$attributeName}Attribute \${$attributeName}{$isFixedValue}",
                    ])
                    ->implode(PHP_EOL . Self::LONG_INDENT);
                })
            );

        return ($attributes->count() > 0 ? PHP_EOL . Self::LONG_INDENT : '') .
            $attributes->implode(',' . PHP_EOL . PHP_EOL . Self::LONG_INDENT);
    }

    // protected function prepareArguments()
    // {
    //     $requiredAttributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true))
    //         ->where('attributes.use', '===', UseEnum::REQUIRED->value);

    //     return ($attributes->count() > 1 ? PHP_EOL . Self::LONG_INDENT : '') .
    //         $attributes
    //             ->map(function ($argumentFields, $argumentName) {
    //                 $argumentName = Str::studly($argumentName);

    //                 $namespace = Str::of(Arr::get($argumentFields, 'namespace'))->afterLast('Attributes')->prepend('Attributes');

    //                 return "{$namespace}\\{$argumentName}Attribute \${$argumentName}";
    //             })
    //             ->implode(',' . PHP_EOL . Self::LONG_INDENT) .
    //         ($attributes->count() > 1 ? PHP_EOL . Self::SHORT_INDENT : '');
    // }

    // protected function prepareArguments()
    // {
    //     $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));
    //     $elements = collect($this->contextInput['elements']->present()->fromJsonFormat(true));

    //     return ($attributes->count() > 1 || $elements->count() > 1 ? PHP_EOL . Self::LONG_INDENT : '') .

    //         $elements->map(function ($elementFields, $elementName) {
    //             $elementName = Str::studly($elementName);

    //             $namespace = Str::of(Arr::get($elementFields, 'namespace'))
    //                 ->dump()
    //                 // ->beforeLast('/')
    //                 ->dump()
    //                 ->afterLast('/')
    //                 ->dd();

    //             return "public {$namespace}\\{$elementName}Element \${$elementName}";
    //         })
    //         ->implode(',' . PHP_EOL . Self::LONG_INDENT) . $attributes->count() > 1 ? ',' . PHP_EOL : '' .

    //         $attributes->map(function ($attributeFields, $attributeName) {
    //             $attributeName = Str::studly($attributeName);

    //             $namespace = Str::of(Arr::get($attributeFields, 'namespace'))->afterLast('Attributes')->prepend('Attributes');

    //             $restrictions = Arr::get($attributeFields, 'restrictions');

    //             $fixed = Arr::get($attributeFields, 'attributes.fixed');

    //             $use = Arr::get($attributeFields, 'attributes.use');

    //             $useOptional = UseEnum::tryFrom($use) === UseEnum::OPTIONAL;

    //             $useOptionalSymbol = ($useOptional  ? '?' : null);

    //             $isFixedValue = ($useOptional ? ' = ' . ($fixed ? $fixed : 'null') : null);

    //             $response = "public {$useOptionalSymbol}{$namespace}\\{$attributeName}Attribute \${$attributeName}{$isFixedValue}";

    //             return $response;
    //         })->implode(',' . PHP_EOL . Self::LONG_INDENT) .
    //     ($attributes->count() > 1 || $elements->count() > 1 ? PHP_EOL . Self::SHORT_INDENT : '');
    // }

    // protected function prepareAssignations()
    // {
    //     $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true))
    //         ->where('attributes.use', '===', UseEnum::REQUIRED->value);

    //     return Self::LONG_INDENT .
    //         $attributes
    //             ->map(function ($assignationFields, $assignationName) {
    //                 $assignationName = Str::studly($assignationName);

    //                 return "\$this->{$assignationName} = \${$assignationName};";
    //             })
    //             ->implode(PHP_EOL . Self::LONG_INDENT);
    // }

    // protected function prepareSetters()
    // {
    //     // $elementsJson = Arr::get($this->contextInput, 'elements.name');

    //     // $elements = collect(json_decode($elementsJson, true));
    //     $elements = collect($this->contextInput['elements']->present()->fromJsonFormat(true));

    //     // $attributesJson = Arr::get($this->contextInput, 'attributes.name');

    //     // $attributes = collect(json_decode($attributesJson, true));
    //     $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));

    //     return $attributes
    //         ->map(function ($assignationFields, $assignationName) {
    //             $assignationName = Str::studly($assignationName);

    //             $namespace = Str::of(Arr::get($assignationFields, 'namespace'))->afterLast('Attributes')->prepend('Attributes');

    //             return Self::SHORT_INDENT . "public function set{$assignationName}Attribute({$namespace}\\{$assignationName}Attribute \${$assignationName})" .
    //                 PHP_EOL . Self::SHORT_INDENT . "{" .
    //                 PHP_EOL . Self::LONG_INDENT . "\$this->{$assignationName} = \${$assignationName};" .
    //                 PHP_EOL . Self::SHORT_INDENT . "}";
    //         })
    //         ->implode(PHP_EOL . PHP_EOL) .
    //         PHP_EOL . PHP_EOL .
    //         $elements
    //             ->map(function ($assignationFields, $assignationName) {
    //                 $assignationName = Str::studly($assignationName);

    //                 $namespace = Str::of(Arr::get($assignationFields, 'namespace'))->afterLast('/');

    //                 return Self::SHORT_INDENT . "public function set{$assignationName}Attribute({$namespace}\\{$assignationName}Attribute \${$assignationName})" .
    //                     PHP_EOL . Self::SHORT_INDENT . "{" .
    //                     PHP_EOL . Self::LONG_INDENT . "\$this->{$assignationName} = \${$assignationName};" .
    //                     PHP_EOL . Self::SHORT_INDENT . "}";
    //             })->implode(PHP_EOL . PHP_EOL);
    // }
}
