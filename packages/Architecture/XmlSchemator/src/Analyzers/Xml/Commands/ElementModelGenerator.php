<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands;

use Architecture\XmlSchemator\Analyzers\Xml\Helpers\ModelBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Helpers\NamespaceBuilder;
use Architecture\XmlSchemator\Builders\Enums\StringFormatEnum;
use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ElementModelGenerator extends GeneratorCommand
{
    const FILE_TYPE = 'Model';
    const SHORT_INDENT = '    ';
    const LONG_INDENT = '        ';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public $inputs = [
        ['model', null, InputOption::VALUE_REQUIRED, 'The name of the Model'],
        ['collection', null, InputOption::VALUE_REQUIRED, 'The name of the Collection'],
        // ['namespace', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['class-namespace-path', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-namespace', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-version-number', null, InputOption::VALUE_REQUIRED, 'The simple container alias name, such as cfd, nomina, pagos, etc.'],

        ['namespaces', null, InputOption::VALUE_REQUIRED, 'The namespaces list for the model to be aware of'],
        ['implements', null, InputOption::VALUE_REQUIRED, 'The implements list for the model to be aware of'],
        ['traits', null, InputOption::VALUE_REQUIRED, 'The traits list for the model to be aware of'],
        ['properties', null, InputOption::VALUE_REQUIRED, 'The properties list for the model to be aware of'],
        ['methods', null, InputOption::VALUE_REQUIRED, 'The methods list for the model to be aware of'],
        ['parent', null, InputOption::VALUE_REQUIRED, 'The parent element for the value to be aware of'],
        ['attributes', null, InputOption::VALUE_REQUIRED, 'The attributes list for the value to be aware of'],
        ['elements', null, InputOption::VALUE_REQUIRED, 'The elements list for the value to be aware of'],
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'core:xml:generate:model:node:element';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the new Element Node Model class';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'Model';
    /**
     * The structure of the file path.
     */
    // protected string $pathStructure = '{section-name}/{container-name}/Models/*';
    protected string $pathStructure = '{SectionName}/{ContainerName}/Models/{VersionNumber}{PathFolder}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{FileName}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'model.stub';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->printInfoMessage('Generating Model');

        $this->promptContextInput('class-namespace-path', 'The class namespace path value to be placed in');
        $this->promptContextInput('xsd-namespace', 'The XSD namespace value to be placed in');
        $this->promptContextInput('xsd-version-number', 'The XSD namespace alias value');

        $this->promptContextInput('model', 'Enter the name of the Model');
        $this->promptContextInput('collection', 'Enter the name of the Collection');
        $this->promptContextInput('namespaces', 'The namespaces list for the model to be aware of, json format');
        $this->promptContextInput('implements', 'The implements list for the model to be aware of, json format');
        $this->promptContextInput('traits', 'The traits list for the model to be aware of, json format');
        $this->promptContextInput('properties', 'The properties list for the model to be aware of, json format');
        $this->promptContextInput('methods', 'The properties list for the model to be aware of, json format');
        $this->promptContextInput('parent', 'The parent element for the value to be aware of, json format');
        $this->promptContextInput('attributes', 'The attributes list for the value to be aware of, json format');
        $this->promptContextInput('elements', 'The elements list for the value to be aware of, json format');

        $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);

        $this->baseNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asStudlyFormat(),
            container: $this->contextInput->get('container')->present()->asStudlyFormat(),
            context: Str::of(Self::FILE_TYPE)->plural(),
            version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: Str::of(Arr::get($parent, 'classNamespacePath'))
        );
        // dump($this->contextInput['traits']);
        $modelBuilder = ModelBuilder::fromContextInput($this->contextInput);

        $generatorParams = [
            'path-parameters' => [
                'SectionName'   => $this->baseNamespace->section->studly(),
                'ContainerName' => $this->baseNamespace->container->studly(),
                'VersionNumber' => $this->baseNamespace->version->studly(),
                'PathFolder'    => $this->baseNamespace->path->studly(),
            ],
            'stub-parameters' => [
                'SectionName'                      => $this->baseNamespace->section->studly(),
                'ContainerName'                    => $this->baseNamespace->container->studly(),
                'BaseNamespace'                    => $this->baseNamespace->getFullyQualifiedClassName(),
                'collection-name'                  => ModelBuilder::getDbCollectionName($this->contextInput),
                'ClassName'                        => $this->contextInput->get('model')->present()->asStudlyFormat(),
                'resource-key'                     => $this->contextInput->get('model')->present()->asSnakeFormat(),
                'class:xml-target-namespace'       => $this->contextInput->get('xsd-namespace')->present()->asOriginalFormat(false),
                'class:xml-element-name'           => $this->contextInput->get('model')->present()->asOriginalFormat(),
                'class:fillable'                   => $modelBuilder->fillableCode,
                'class:casts'                      => $modelBuilder->castsCode,
                'class:deserializers'              => $modelBuilder->deserializersCode,
                'class:relationships'              => $modelBuilder->relationshipsCode,
                'class:use-model-namespaces'       => $modelBuilder->namespacesCode,
                'class:use-model-traits'           => $modelBuilder->traitsCode,
                'class:implements-model-contracts' => $modelBuilder->implementsCode,
            ],
            'file-parameters' => [
                'FileName'             => $this->contextInput->get('model')->present()->asStudlyFormat(),
            ],
        ];

        $this->generateFiles($generatorParams);
    }
}
