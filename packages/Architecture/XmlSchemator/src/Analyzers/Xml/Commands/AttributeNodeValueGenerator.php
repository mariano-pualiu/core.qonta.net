<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\OccursEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\UseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Helpers\NamespaceBuilder;
use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class AttributeNodeValueGenerator extends GeneratorCommand
{
    const FILE_TYPE     = 'AttributeNodeValue';
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

        ['class-namespace-path', null, InputOption::VALUE_REQUIRED, 'The sub-namespace onder the value will be asigned'],
        // ['xsd-namespace', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-version-number', null, InputOption::VALUE_REQUIRED, 'The simple container alias name, such as cfd, nomina, pagos, etc.'],

        ['annotation', null, InputOption::VALUE_OPTIONAL, 'The documentation annotation for the value to be aware of'],
        ['properties', null, InputOption::VALUE_REQUIRED, 'The properties list for the value to be aware of'],
        // ['attributes', null, InputOption::VALUE_REQUIRED, 'The attributes list for the value to be aware of'],
        // ['restrictions', null, InputOption::VALUE_REQUIRED, 'The restrictions list for the value to be aware of'],
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    // protected $name = 'core:generate:value:node:attribute';
    protected $name = 'core:xml:generate:value:node:attribute';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the new Attribute Node Value class';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'AttributeNodeValue';
    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{SectionName}/{ContainerName}/Values/{VersionNumber}/Attributes/{PathFolder}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{FileName}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'values/attribute_value.stub';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->printInfoMessage('Generating Attribute Node Value');

        $this->promptContextInput('class-namespace-path', 'The namespace value to be placed in');
        // $this->promptContextInput('xsd-namespace', 'The XSD namespace value to be placed in');
        $this->promptContextInput('xsd-version-number', 'The XSD namespace alias value');

        $this->promptContextInput('model', 'Enter the name of the Model');
        $this->promptContextInput('collection', 'Enter the name of the Collection');
        $this->promptContextInput('parent', 'The parent element for the value to be aware of, json format');
        $this->promptContextInput('annotation', 'The annotation for the value to be aware of');
        $this->promptContextInput('properties', 'The properties list for the value to be aware of, json format');
        // $this->promptContextInput('attributes', 'The attributes list for the value to be aware of, json format');
        // $this->promptContextInput('restrictions', 'The restrictions list for the value to be aware of, json format');

        $subNamespace = Str::of($this->contextInput['class-namespace-path']->stringValue->value)->replace('/', '\\');

        $attributeProperties = json_decode($this->contextInput['properties']->stringValue);

        $typeConstant = Str::of($this->contextInput['class-namespace-path']->stringValue)
            ->beforeLast('/')
            ->afterLast('/')
            ->finish('Enum');

        $enumsSubNamespace = Str::of($subNamespace)
            ->after('\\')
            ->beforeLast('\\')
            ->finish('Enum');

        // $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);

        // $this->baseNamespace = new NamespaceBuilder(
        //     section: $this->contextInput->get('section')->present()->asStudlyFormat(),
        //     container: $this->contextInput->get('container')->present()->asStudlyFormat(),
        //     context: 'Values',
        //     version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
        //     path: Str::of(Arr::get($parent, 'classNamespacePath'))->prepend('Attributes\\')
        // );

        $generatorParams = [
            'path-parameters' => [
                'SectionName'          => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName'        => $this->contextInput->get('container')->present()->asStudlyFormat(),
                'VersionNumber'        => $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
                'PathFolder'           => Str::of($subNamespace)->after('/')->toString(),
            ],
            'stub-parameters' => [
                'SectionName'          => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName'        => $this->contextInput->get('container')->present()->asStudlyFormat(),
                'VersionNumber'        => $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
                'SubNamespace'         => Str::of($subNamespace)->after('\\')->beforeLast('\\')->toString(),
                'EnumsSubNamespace'    => $enumsSubNamespace->toString(),

                'ClassName'            => $this->contextInput->get('model')->present()->asStudlyFormat(),
                'class:annotation'     => $this->contextInput['annotation']->stringValue?->value,
                'fixed:constant'       => $attributeProperties->fixed ?? 'null',
                'name:constant'        => $attributeProperties->name,
                'use:option'           => UseEnum::tryFrom($attributeProperties->use)->name,
                'type:constant'        => $typeConstant,
                'model-name'           => $attributeProperties->name,
            ],
            'file-parameters' => [
                'FileName'             => $this->contextInput->get('model')->present()->asStudlyFormat()->finish('Attribute'),
            ],
        ];

        $this->generateFiles($generatorParams);
    }

    // protected function prepareUseNamespaces()
    // {
    //     // dump($this->contextInput);
    //     // $elementsJson = Arr::get($this->contextInput, 'elements.name');

    //     // $elements = json_decode($elementsJson, true);

    //     $attributesJson = Arr::get($this->contextInput, 'attributes.name');

    //     $attributes = json_decode($attributesJson, true);

    //     return collect($attributes)
    //         ->pluck('namespace')
    //         ->unique()
    //         ->values()
    //         ->map(function ($namespace) {
    //             $namespace = Str::replaceFirst('\\', '', $namespace);
    //             return "use {$namespace};";
    //         })
    //         ->implode(PHP_EOL);
    // }
}
