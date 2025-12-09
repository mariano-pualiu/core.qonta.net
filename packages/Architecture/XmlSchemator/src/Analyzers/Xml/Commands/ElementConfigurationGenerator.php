<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\OccursEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Helpers\NamespaceBuilder;
use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ElementConfigurationGenerator extends GeneratorCommand
{
    const FILE_TYPE = 'Configuration';
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
    protected $name = 'core:xml:generate:value:node:config';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Configuration file for an XSD element definition';

    /**
     * Root directory of all sections
     *
     * @var string
     */
    protected const ROOT = 'config/sections';

    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{SectionName}/{ContainerName}/Configs/{VersionNumber}/{PathFolder}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{FileName}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'configs/xsd_element.stub';

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

        $sectionName = $this->contextInput->get('section')->present()->asStudlyFormat();
        $containerName = $this->contextInput->get('container')->present()->asStudlyFormat();
        $versionNumber = $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat();
        $modelName = Arr::get($this->contextInput, 'model')->present()->asOriginalFormat()->toString();

        $elementNamespaces = Self::prepareNamespaces($this->contextInput, $sectionName, $containerName, $versionNumber);
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
        $elementDeserializers = $this->prepareElementDeserializers();
        $elementRelationships = $this->prepareElementRelationships();

        ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($this->contextInput->get('class-namespace-path')->present()->asOriginalFormat());
        // $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);
        $baseNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asOriginalFormat(),
            container: $this->contextInput->get('container')->present()->asOriginalFormat(),
            context: 'Models',
            version: $this->contextInput->get('xsd-version-number')->present()->asOriginalFormat(),
            path: $path,
            class: $class,
        );
        // dd($path, Str::of(Arr::get($parent, 'classNamespacePath')), $baseNamespace->path->snake()->replace('\\', '/')->replace('/_', '/'), $baseNamespace->path->studly(), $class);

        $generatorParams = [
            'path-parameters' => [
                'SectionName'   => $baseNamespace->section->snake(),
                'ContainerName' => $baseNamespace->container->snake(),
                'VersionNumber' => $baseNamespace->version->snake(),
                'PathFolder'    => $baseNamespace->path->snake()->replace('\\', '/')->replace('/_', '/'),
            ],
            'stub-parameters' => [
                'ClassName'            => $this->contextInput->get('model')->present()->asStudlyFormat(),
                'relationships'        => $elementRelationships,
                'deserializers'        => $elementDeserializers,
                'namespaces'           => $elementNamespaces,
            ],
            'file-parameters' => [
                'FileName'             => $this->contextInput->get('model')->present()->asSnakeFormat(),
            ],
        ];
        // dd($generatorParams);
        $this->generateFiles($generatorParams);
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

    protected static function prepareNamespaces($contextInput, $sectionName, $containerName, $versionNumber)
    {
        $relationshipsNamespaces = Self::buildRelationshipsNamespaces($contextInput, $sectionName, $containerName, $versionNumber);
        $attributesNamespaces = Self::buildAttributesNamespace($contextInput, $sectionName, $containerName, $versionNumber);
        $elementNamespace = Self::buildElementNamespace($contextInput, $sectionName, $containerName, $versionNumber);

        // dd(
        //     $relationshipsNamespaces,
        //     $attributesNamespaces,
        //     $elementNamespace
        // );
        $allNamespaces = collect([])
            ->merge($relationshipsNamespaces)
            // ->dd();
            ->merge($attributesNamespaces)
            ->merge($elementNamespace);

        return /*($elements->count() > 0 ? Self::LONG_INDENT : '') .*/
            Str::of(varexport($allNamespaces->toArray(), true))
                ->replace('0 => ', '')
                ->replace('\\\\', '\\')
                ->replace(PHP_EOL, PHP_EOL . Self::SHORT_INDENT)/* .*/
            /*($elements->count() > 0 ? ',' . PHP_EOL . Self::LONG_INDENT : '')*/;
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

    protected static function buildAttributesNamespace($contextInput, $sectionName, $containerName, $versionNumber)
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
