<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\OccursEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Helpers\NamespaceBuilder;
use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

/**
 *  This generator class is intended to:
 *      - Generate a complete schema file (php array)
 *          - That indicates the whole hirearchycal structure for a CFDI XML file given by the CFDI XSD v40 file
 *      - Where every `Element` node has its Node path clearly defined.
 *
 *  The path has to:
 *      - Clearly map to the respecting Element model class by its namespace, and;
 *          - For each of the attributes of the elements to the corresponding `Attribute` model class, also by its namespace
 *
 *  E.g.
 *      App\Containers\Architecture\XmlSchemator\Analyzers\Examples\ComprobanteSchemaExample.php
 *
 */

class _AttributesMapGenerator extends GeneratorCommand
{
    const FILE_TYPE = 'Map';
    const SHORT_INDENT = '    ';
    const LONG_INDENT = '        ';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public $inputs = [
        ['model', null, InputOption::VALUE_OPTIONAL, 'The name of the Model'],
        ['class-namespace-path', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-namespace', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-version-number', null, InputOption::VALUE_REQUIRED, 'The simple container alias name, such as cfd, nomina, pagos, etc.'],
        ['parent', null, InputOption::VALUE_REQUIRED, 'The parent element for the value to be aware of'],
        ['elements', null, InputOption::VALUE_REQUIRED, 'The elements list for the value to be aware of'],
        ['attributes', null, InputOption::VALUE_REQUIRED, 'The attributes list for the value to be aware of'],
    ];
    /**
     * The console command name.
     *
     * @var string
     */
    // protected $name = 'core:generate:value:node:config';
    protected $name = 'core:xml:generate:paths:nodes:attributes:mapping_';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Path to Namespace Mapping file for an XSD definition';

    /**
     * Root directory of all sections
     *
     * @var string
     */
    protected const ROOT = 'config/mappings';

    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{SectionName}/{ContainerName}/{VersionNumber}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = 'attributes';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'mappings/xsd_attributes.stub';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->printInfoMessage('Generating Configuration File');

        $this->promptContextInput('model', 'Enter the name of the Model');
        $this->promptContextInput('class-namespace-path', 'The class namespace path value to be placed in');
        $this->promptContextInput('xsd-namespace', 'The XSD namespace value to be placed in');
        $this->promptContextInput('xsd-version-number', 'The XSD namespace alias value');
        $this->promptContextInput('parent', 'The parent element for the value to be aware of, json format');
        $this->promptContextInput('elements', 'The elements list for the value to be aware of, json format');
        $this->promptContextInput('attributes', 'The attributes list for the value to be aware of, json format');

        $sectionName   = $this->contextInput->get('section')->present()->asStudlyFormat();
        $containerName = $this->contextInput->get('container')->present()->asStudlyFormat();
        $versionNumber = $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat();
        $modelName     = Arr::get($this->contextInput, 'model')->present()->asOriginalFormat()->toString();

        $attributesPaths = Self::buildAttributesPaths($this->contextInput, $sectionName, $containerName, $versionNumber);
        dump($attributesPaths);

        // $elementPath = Self::buildNodePath($this->contextInput, $sectionName, $containerName, $versionNumber);
        // dump($elementPath);

        // $parent = collect($this->contextInput['parent']->present()->fromJsonFormat(true));
        // $className = $this->contextInput->get('model')->present()->asOriginalFormat();
        // $elements = collect($this->contextInput['elements']->present()->fromJsonFormat(true));
        // dd($parent, $className, $elements);

        // $elementNamespaces->when(
        //     in_array($modelName, [
        //         // 'Comprobante',
        //         'Complemento',
        //         'CfdiRelacionados'
        //     ]),
        //     fn ($relationships) => $relationships->dd(),
        //     fn ($relationships) => $relationships->dump()
        // );
        // dd($elementNamespaces);
        // $elementDeserializers = $this->prepareElementDeserializers();
        // $elementRelationships = $this->prepareElementRelationships();

        // ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($this->contextInput->get('class-namespace-path')->present()->asOriginalFormat());


        // $baseNamespace = new NamespaceBuilder(
        //     section: $this->contextInput->get('section')->present()->asOriginalFormat(),
        //     container: $this->contextInput->get('container')->present()->asOriginalFormat(),
        //     context: 'Models',
        //     version: $this->contextInput->get('xsd-version-number')->present()->asOriginalFormat(),
        //     path: $path,
        //     class: $class,
        // );

        $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);
        $baseNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asStudlyFormat(),
            container: $this->contextInput->get('container')->present()->asStudlyFormat(),
            context: 'Values',
            version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: Str::of(Arr::get($parent, 'classNamespacePath'))->replace('/', '\\')->prepend('\\Elements')
        );

        // $attributesNamespace = new NamespaceBuilder(
        //     section: $this->contextInput->get('section')->present()->asStudlyFormat(),
        //     container: $this->contextInput->get('container')->present()->asStudlyFormat(),
        //     context: 'Values',
        //     version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
        //     path: $this->contextInput['class-namespace-path']->stringValue->replace('/', '\\')->prepend('\\Attributes')
        // );

        // dump(['path' => $path, 'class' => $class]);

        // $generatorParams = [
        //     'path-parameters' => [
        //         'SectionName'   => $baseNamespace->section->snake(),
        //         'ContainerName' => $baseNamespace->container->snake(),
        //         'VersionNumber' => $baseNamespace->version->snake(),
        //         'PathFolder'    => $baseNamespace->path->snake()->replace('\\', '/')->replace('/_', '/'),
        //     ],
        //     'stub-parameters' => [
        //         'BaseNamespace'                => $baseNamespace->getFullyQualifiedClassName(),
        //         'AttributesNamespace'          => $attributesNamespace->getFullyQualifiedClassName()->append(' as ' . $attributesNamespace->getFormattedAliasName(['path' => fn ($path) => $path->afterLast('\\')->append('Attributes')])),
        //         // 'class:use-element-namespaces' => self::prepareAttributesNamespace($this->contextInput),

        //         // 'ClassName'            => $this->contextInput->get('model')->present()->asStudlyFormat(),
        //         // 'relationships'        => $elementRelationships,
        //         // 'deserializers'        => $elementDeserializers,
        //         // 'namespaces'           => $elementNamespaces,
        //     ],
        //     'file-parameters' => [
        //         'FileName'             => $this->contextInput->get('model')->present()->asSnakeFormat(),
        //     ],
        // ];

        // $pathParameters = [
        //     'SectionName'   => $baseNamespace->section->snake(),
        //     'ContainerName' => $baseNamespace->container->snake(),
        //     'VersionNumber' => $baseNamespace->version->snake(),
        //     'PathFolder'    => $baseNamespace->path->snake()->replace('\\', '/')->replace('/_', '/')->after('/'),
        // ];
        // dump($pathParameters);
        // $filePathStructure = $this->parsePathStructure($this->pathStructure, $pathParameters);
        // dump($filePathStructure);
        // $filePath = $this->getFilePath($filePathStructure);
        // dd($filePath);

        $stubParameters = [
            'AttributesPaths' => var_export($attributesPaths, true),
        ];

        $pathParameters = [
            'SectionName'   => $baseNamespace->section->snake()->toString(),
            'ContainerName' => $baseNamespace->container->snake()->toString(),
            'VersionNumber' => $baseNamespace->version->snake()->toString(),
            'PathFolder'    => $baseNamespace->path->snake()->replace('\\', '/')->replace('/_', '/')->after('/')->toString(),
        ];

        // echo "===================================\n";
        $fileParameters = [
            // 'FileName' => $this->contextInput->get('model')->present()->asSnakeFormat()->toString(),
            // 'FileName' => $this->contextInput->get('parent')->present()->asSnakeFormat()->dd()->toString(),
            // 'FileName' => Str::of(Arr::get($parent, 'classNamespacePath'))
            //     ->whenEmpty(fn ($classNamespacePath) => $this->contextInput->get('model')->present()->asSnakeFormat())
            //     ->after('/')
            //     ->before('/')
            //     ->snake(),
                // ->dump(),
        ];
        // echo "===================================\n";
        $this->parsedFileName = $this->parseFileStructure($this->nameStructure, $fileParameters);
        // dump([
        //     'nameStructure' => $this->nameStructure,
        //     'fileParameters' => $fileParameters,
        //     'parsedFileName' => $this->parsedFileName
        // ]);

        $parsedFilePathStructure = $this->parsePathStructure($this->pathStructure, $pathParameters);
        // dump([
        //     'pathStructure' => $this->pathStructure,
        //     'pathParameters' => $pathParameters,
        //     'parsedFilePathStructure' => $parsedFilePathStructure
        // ]);


        $filePath = $this->getFilePath($parsedFilePathStructure);

        // $this->generateMappingsFileContents($filePath, $stubParameters);

        // if (!$this->fileSystem->exists($filePath) || in_array(Static::FILE_TYPE, config('architecture-xmlSchemator.core.regenerate_file_types'))) {
        dump($filePath);
        // $this->generateFiles($generatorParams);
    }

    protected function prepareElementRelationships()
    {
        $sectionName = $this->contextInput->get('section')->present()->asStudlyFormat();
        $containerName = $this->contextInput->get('container')->present()->asStudlyFormat();
        $versionNumber = $this->contextInput->get('xsd-version-number')->present()->asOriginalFormat();

        $parent = collect($this->contextInput['parent']->present()->fromJsonFormat(true));
        $className = $this->contextInput->get('model')->present()->asOriginalFormat();

        $elements = collect($this->contextInput['elements']->present()->fromJsonFormat(true));

        $elementRelationships = $elements
            ->groupBy(function ($elementAttributes, $elementName) use ($className, $versionNumber) {
                $minOccurs = (int)($elementAttributes['minOccurs'] ?? 1);
                $maxOccurs = $elementAttributes['maxOccurs'] ?? 1;
                $maxOccurs = $maxOccurs == OccursEnum::UNBOUNDED->value
                    ? OccursEnum::UNBOUNDED
                    : (int)$maxOccurs;
                return match ($maxOccurs) {
                    1                     => Arr::get($elementAttributes, 'children_element_nodes_count', 0) > 0
                        ? 'has_one'
                        : 'embeds_one',
                    OccursEnum::UNBOUNDED => Str::contains($className, $elementName)
                        ? 'embeds_many'
                        : 'has_many',
                };
            })
            ->when(
                $parent->isNotEmpty() && !Str::contains(Arr::get($parent, 'modelName'), $className),
                fn ($relationships) => $relationships->put('belongs_to', collect([$parent]))/*->dump()*/
            )
            ->map(fn ($relationships, $relationshipType) => $relationships
                ->pluck('classNamespacePath')
                ->map(fn ($classNamespacePath) => Str::of($classNamespacePath)->replace('/', '\\'))
                // ->map(fn ($relationships) => Str::of(Arr::get($relationships, 'classNamespacePath'))->replace('/', '\\'))
                ->map(function ($namespacePath) use ($sectionName, $containerName, $versionNumber) {
                    ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($namespacePath);

                    return new NamespaceBuilder(
                        section: $sectionName,
                        container: $containerName,
                        context: 'Models',
                        version: $versionNumber,
                        path: $path,
                        class: $class,
                    );
                })
                ->mapWithKeys(fn ($relationshipFqnClass) => [
                    $relationshipFqnClass->getFormattedAliasName(['class'])->camel()->toString() => [
                        $relationshipFqnClass->getQualifiedClassConstant(
                            $relationshipFqnClass->path->isNotEmpty()
                                ? ['path' => fn ($path) => $path->afterLast('\\'), 'context']
                                : null
                        )->toString()
                    ]
                ])
            );

        return /*($elements->count() > 0 ? Self::LONG_INDENT : '') .*/
            Str::of(varexport( $elementRelationships->toArray(), true))
                ->replace('0 => ', '')
                ->replace('\\\\', '\\')
                ->replace(PHP_EOL, PHP_EOL . Self::LONG_INDENT)/* .*/
            /*($elements->count() > 0 ? ',' . PHP_EOL . Self::LONG_INDENT : '')*/;
    }

    protected function prepareElementDeserializers()
    {
        $sectionName = $this->contextInput->get('section')->present()->asStudlyFormat();
        $containerName = $this->contextInput->get('container')->present()->asStudlyFormat();
        $versionNumber = $this->contextInput->get('xsd-version-number')->present()->asOriginalFormat();

        // $modelNamespace = $this->getContextNamespace('Models');

        $elements = collect($this->contextInput['elements']->present()->fromJsonFormat(true));

        $elementDeserlializers = $elements
            ->pluck('classNamespacePath')
            ->map(fn ($classNamespacePath) => Str::of($classNamespacePath)->replace('/', '\\'))
            ->map(function ($namespacePath) use ($sectionName, $containerName, $versionNumber) {
                ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($namespacePath);

                return new NamespaceBuilder(
                    section: $sectionName,
                    container: $containerName,
                    context: 'Models',
                    version: $versionNumber,
                    path: $path,
                    class: $class,
                );
            })
            ->mapWithKeys(fn ($relationshipFqnClass) => [
                $relationshipFqnClass->getFormattedAliasName(['class'])->toString() =>
                    $relationshipFqnClass->getQualifiedClassConstant(
                        $relationshipFqnClass->path->isNotEmpty()
                            ? ['path' => fn ($path) => $path->afterLast('\\'), 'context']
                            : null
                    )->toString()
            ])
            ->all();

        $targetNamespace = $this->contextInput->get('xsd-namespace')->present()->asOriginalFormat(false);

        return Str::of(varexport(!empty($elementDeserlializers) ? [(string) $targetNamespace => $elementDeserlializers] : [], true))
                ->replace('\\\\', '\\')
                ->replace(PHP_EOL, PHP_EOL . Self::LONG_INDENT)
                /*->dd()*/;
    }

    protected static function buildRelationshipsNamespaces($contextInput, $sectionName, $containerName, $versionNumber)
    {
        $elements = collect($contextInput['elements']->present()->fromJsonFormat(true));
        $parent = collect($contextInput['parent']->present()->fromJsonFormat(true));
        $className = $contextInput->get('model')->present()->asOriginalFormat();

        $assumedEmbeded = Str::contains(Arr::get($parent, 'modelName'), $className);

        return $elements
            ->when(
                $parent->isNotEmpty() && !$assumedEmbeded,
                fn ($relationships) => $relationships->push($parent)/*->dump()*/
            )
            ->pluck('classNamespacePath')
            ->map(fn ($classNamespacePath) => Str::of($classNamespacePath)->replace('/', '\\')->beforeLast('\\'))
            ->unique()
            ->map(function ($namespacePath) use ($sectionName, $containerName, $versionNumber) {
                ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($namespacePath->finish('\\'));

                return new NamespaceBuilder(
                    section: $sectionName,
                    container: $containerName,
                    context: 'Models',
                    version: $versionNumber,
                    path: $path,
                    class: $class,
                );
            })
            // ->dump()
            ->mapWithKeys(fn ($relationshipFqnClass) => [
                $relationshipFqnClass->getFullyQualifiedClassName()->toString()
                    => $relationshipFqnClass->path->isEmpty()
                        ? $relationshipFqnClass->getFormattedAliasName()->toString()
                        : $relationshipFqnClass->getFormattedAliasName(
                            ['path' => fn ($path) => $path->afterLast('\\'), 'context']
                        )
                        ->toString()
            ]);
            // ->dd();
            // ->when(
            //     in_array($className->toString(), [
            //         // 'Comprobante',
            //         'Complemento',
            //         'CfdiRelacionados'
            //     ]),
            //     fn ($relationships) => $relationships->dd(),
            //     fn ($relationships) => $relationships->dump()
            // );
    }

    protected static function buildNodePath(
        $contextInput,
        $sectionName,
        $containerName,
        $versionNumber
    )
    {
        $modelName = $contextInput->get('model')->present()->asStudlyFormat();
        ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($contextInput->get('class-namespace-path')->present()->asOriginalFormat());

        // dump(['path' => $path, 'class' => $class]);

        $parent = $contextInput['parent']->present()->fromJsonFormat(true);

        $nodeNamespace = new NamespaceBuilder(
            section: $contextInput->get('section')->present()->asStudlyFormat(),
            container: $contextInput->get('container')->present()->asStudlyFormat(),
            context: 'Values',
            version: $contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: Str::of(Arr::get($parent, 'classNamespacePath'))->replace('/', '\\')->prepend('\\Elements')
        );

        return [
            Str::of(Arr::get($parent, 'classNamespacePath'))
                // ->after('/')
                ->replace('/', '.')
                ->finish($modelName)
                ->toString()
                => $nodeNamespace
                    ->getFullyQualifiedClassName()
                    ->append('\\')
                    ->finish($modelName.'Element')
                    ->toString()
        ];
    }

    protected static function buildAttributesNamespace(
        $contextInput,
        $sectionName,
        $containerName,
        $versionNumber
    )
    {
        $attributes = $contextInput['attributes']->present()->fromJsonFormat(true);

        $model = $contextInput->get('model')->present()->asOriginalFormat()->toString();

        return collect($attributes)
            ->pluck('classNamespacePath')
            ->unique()
            ->map(fn ($classNamespacePath) => Str::of($classNamespacePath)->replace('/', '\\')->beforeLast('\\'))
            ->map(function ($namespacePath) use ($sectionName, $containerName, $versionNumber) {
                $pathClass = Str::of('Attributes')->append($namespacePath->finish('\\'));

                ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($pathClass);

                return new NamespaceBuilder(
                    section: $sectionName,
                    container: $containerName,
                    context: 'Values',
                    version: $versionNumber,
                    path: $path,
                    class: $class,
                );
            })
            // ->dd()
            ->mapWithKeys(fn ($attributeNamespace) => [
                $attributeNamespace->getFullyQualifiedClassName()->toString()
                    => $attributeNamespace->getFormattedAliasName([
                        'path' => fn ($path) => $path->afterLast('\\'),
                        'class' => fn ($path) => $path->append('Attributes')
                    ])->toString()
            ]);
            // ->when(
            //     in_array($model, [
            //         // 'Comprobante',
            //         'Complemento',
            //         'CfdiRelacionados'
            //     ]),
            //     fn ($relationships) => $relationships->dd(),
            //     fn ($relationships) => $relationships->dump()
            // );
    }

    // protected static function buildAttributesPaths(
    //     $contextInput,
    //     $sectionName,
    //     $containerName,
    //     $versionNumber
    // )
    // {
    //     $attributesNamespaces = Self::buildAttributesNamespace($contextInput, $sectionName, $containerName, $versionNumber);

    //     dd($attributesNamespaces);
    //     $attributes = $contextInput['attributes']->present()->fromJsonFormat(true);

    //     $model = $contextInput->get('model')->present()->asOriginalFormat()->toString();

    //     // ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($namespacePath->finish('\\'));
    //     // ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($contextInput->get('class-namespace-path')->present()->asOriginalFormat());
    //     // dd(['path' => $path, 'class' => $class]);
    //     return collect($attributes)
    //         ->pluck('classNamespacePath', 'attributes.name')
    //         // ->dump()
    //         ->mapWithKeys(fn ($attributePath, $attributeName) => [
    //             Str::of($attributePath)->after('/')->replace('/', '.').'@'.$attributeName => $attributesNamespaces->keys()->get(0).'\\'.$attributeName.'Attribute'
    //         ]);
    //         // ->keyBy(fn ($attributeName) => $attributesNamespaces->keys()->get(0).'\\'.$attributeName)
    //         // ->dd();
    // }

    protected static function buildAttributesPaths(
        $contextInput,
        $sectionName,
        $containerName,
        $versionNumber
    )
    {
        $attributes = $contextInput['attributes']->present()->fromJsonFormat(true);

        return collect($attributes)
            ->pluck('classNamespacePath', 'attributes.name')
            ->mapWithKeys(function ($classNamespacePath, $attributeName) use ($sectionName, $containerName, $versionNumber) {
                $namespacePath = Str::of($classNamespacePath)->replace('/', '\\')->beforeLast('\\');
                $pathClass = Str::of('Attributes')->append($namespacePath->finish('\\'));

                ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($pathClass);

                $attributeNamespace = new NamespaceBuilder(
                    section: $sectionName,
                    container: $containerName,
                    context: 'Values',
                    version: $versionNumber,
                    path: $path,
                    class: $class,
                );

                $attributePath = Str::of($classNamespacePath)
                    ->after('/')
                    ->replace('/', '.')
                    // ->append('@')
                    ->finish($attributeName)
                    ->toString();

                $attributeClass = $attributeNamespace
                    ->getFullyQualifiedClassName()
                    ->finish('\\'.$attributeName.'Attribute')->toString();

                return [$attributePath => $attributeClass];
            });
    }

    protected static function buildElementNamespace($contextInput, $sectionName, $containerName, $versionNumber)
    {
        // use App\Containers\{{SectionName}}\{{ContainerName}}\Values\{{VersionNumber}}\Elements{{SubNamespace}}{{ClassName}}Element;

        $namespacePath = $contextInput->get('class-namespace-path')->present()->asStudlyFormat()->replace('/', '\\');
        $modelName = $contextInput->get('model')->present()->asStudlyFormat();

        $elementNamespace = new NamespaceBuilder(
            section: $sectionName,
            container: $containerName,
            context: 'Values',
            version: $versionNumber,
            path: Str::of('Elements')->append($namespacePath->beforeLast('\\')),
            class: $modelName.'Element',
        );

        // $elementNamespace->dump();

        return collect(
            [
                $elementNamespace->getFullyQualifiedClassName()->toString()
                    => $elementNamespace->getFormattedAliasName(['class'])->toString()
            ]
        );
        // ->dd();
    }
}
