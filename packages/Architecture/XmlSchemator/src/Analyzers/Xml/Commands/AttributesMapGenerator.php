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

class AttributesMapGenerator extends GeneratorCommand
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
        ['methods', null, InputOption::VALUE_REQUIRED, 'The methods list for the model to be aware of'],
        ['elements', null, InputOption::VALUE_REQUIRED, 'The elements list for the value to be aware of'],
        ['attributes', null, InputOption::VALUE_REQUIRED, 'The attributes list for the value to be aware of'],
    ];
    /**
     * The console command name.
     *
     * @var string
     */
    // protected $name = 'core:generate:value:node:config';
    protected $name = 'core:xml:generate:paths:nodes:attributes:mapping';
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
        // $modelName     = Arr::get($this->contextInput, 'model')->present()->asOriginalFormat()->toString();
        $modelName     = $this->contextInput->get('model')->present()->asOriginalFormat()->toString();
        // $methods       = $this->contextInput->get('methods')->present()->fromJsonFormat()/*->asFormat(StringFormatEnum::STRING_ARRAY)*/;
        // dump(['methods' => $methods]);

        echo "======================================================================================================\n";
        // $elementPath = Self::buildNodePath($this->contextInput, $sectionName, $containerName, $versionNumber);
        // dump(['elementPath' => $elementPath]);        // App\Containers\Sat\Cfdi\Values\V33\Elements\ComprobanteElement

        $attributesPaths = Self::buildAttributesNodePaths($this->contextInput, $sectionName, $containerName, $versionNumber);
        dump(['attributesPaths' => $attributesPaths]);
        // "Comprobante.Version" => "App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\VersionAttribute"
        // "Comprobante.Serie" => "App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\SerieAttribute"

        $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);
        // dump(['parent' => $parent]);

        $baseNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asStudlyFormat(),
            container: $this->contextInput->get('container')->present()->asStudlyFormat(),
            context: 'Values',
            version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: Str::of(Arr::get($parent, 'classNamespacePath'))->replace('/', '\\')->prepend('\\Elements')
        );

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

        // $this->generateFiles($generatorParams);

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
        dump([
            'filePath' => $filePath,
            // 'fileSystem' => $this->fileSystem,
        ]);

        // dump([
        //     'stubParameters' => $stubParameters
        // ]);

        $this->generateMappingsFileContents($filePath, $stubParameters);

        // dump($mappingFileContent);
    }

    /**
     * @return  mixed
     * @throws FileNotFoundException
     */
    protected function generateMappingsFileContents(
        string $filePath,
        array $stubParameters
    )
    {
        $stubContent = $this->getStubContent();
        $renderedStubContent = $this->parseStubContent($stubContent, $stubParameters);

        $elementsFilePath = str_replace('attributes', 'elements', $filePath);

        dump([
            // 'stubContent'         => $stubContent,
            // 'stubParameters'      => $stubParameters,
            // 'renderedStubContent' => $renderedStubContent,
            // 'filePath'            => $filePath,
            'elementsFilePath'    => $elementsFilePath,
        ]);

        if ($this->fileSystem->exists($filePath) && $this->fileSystem->exists($elementsFilePath)) {
            $elementsMappingsFileContents = $this->fileSystem->get($elementsFilePath);
            $elementMappings = collect(eval(preg_replace('/^<\?php\s*/', '', $elementsMappingsFileContents)) ?? []);
            // dump($elementMappings);

            $attributesMappingsFileContents = $this->fileSystem->get($filePath);

            $currentMappings = eval(preg_replace('/^<\?php\s*/', '', $attributesMappingsFileContents)) ?? [];
            $currentMappings = collect($currentMappings);

            // dd($currentMappings);
            $appendingMappings = eval(preg_replace('/^<\?php\s*/', '', $renderedStubContent));
            // dd(['appendingMappings' => $appendingMappings]);

            $appendingMappings = collect($appendingMappings)
                ->mapWithKeys(function($nodeClass, $nodePath) use ($elementMappings) {
                    $relevantPrecedingMappingPath = $elementMappings
                        ->reverse()
                        ->keys()
                        // ->dd()
                        // ->dump()
                        // ->filter(fn($mappingNodeClass, $mappingNodePath) => Str::contains($mappingNodePath, '*'))
                        // ->dump()
                        // ->dump()
                        ->reduce(function($carry, $mappingNodePath) use ($nodePath) {
                            return $carry === false
                                && Str::of($nodePath)
                                    ->replace('.*', '')
                                    ->contains(Str::replace('.*', '', $mappingNodePath))
                                        ? $mappingNodePath
                                        : $carry;
                        }, false);

                    dump([
                        'relevantPrecedingMappingPath' => $relevantPrecedingMappingPath
                    ]);

                    $nodePath = Str::of($nodePath)
                        ->when($relevantPrecedingMappingPath, fn ($nodePath) => $nodePath
                            ->whenEndsWith(
                                '.*',
                                fn ($nodePath) => $nodePath->beforeLast('.*')->afterLast('.')->prepend($relevantPrecedingMappingPath.'.')->append('.*'),
                                fn ($nodePath) => $nodePath->afterLast('.')->prepend($relevantPrecedingMappingPath.'.')
                            ))
                        // ->dump()
                        ->toString();

                    return [
                        $nodePath => $nodeClass
                    ];
                });

            $newMappings = $currentMappings->merge($appendingMappings);

            // dump([
            //     '_mappings'         => $this->fileSystem->get($filePath),
            //     'mappings'          => $mappings,
            //     'mappings'       => $mappings,
            //     'appendingMappings' => $appendingMappings
            // ]);

            $stubParameters['AttributesPaths'] = var_export($newMappings->all(), true);
        }
        // dump($stubParameters);
        $renderedStubContent = $this->parseStubContent($stubContent, $stubParameters);
        // dd($renderedStubContent);

        $this->generateFile($filePath, $renderedStubContent);

        return require $filePath;
        // dd($mappings);
    }

    // protected static function buildNodePath(
    //     $contextInput,
    //     $sectionName,
    //     $containerName,
    //     $versionNumber
    // )
    // {
    //     $modelName = $contextInput->get('model')->present()->asStudlyFormat();
    //     // dump(['modelName' => $modelName]);

    //     ['path' => $path, 'class' => $class] = NamespaceBuilder::splitPathClass($contextInput->get('class-namespace-path')->present()->asOriginalFormat());

    //     // dump(['path' => $path, 'class' => $class]);

    //     $parent = $contextInput['parent']->present()->fromJsonFormat(true);
    //     // dump(['parent' => $parent]);

    //     $elementNodeHasSiblings = collect(Arr::get($parent, 'methods.relationships'))
    //         // ->dump()
    //         ->filter(fn ($item, $key) => in_array($key, ['MongoDB\Laravel\Relations\HasMany', 'MongoDB\Laravel\Relations\EmbedsMany']))
    //         // ->dump()
    //         ->flatten()
    //         // ->dump()
    //         ->contains(fn ($item) => Str::endsWith($item, $modelName->append('::class')));
    //         // ->dump();
    //         // dump([
    //         //     'elementNodeHasSiblings' => $elementNodeHasSiblings
    //         // ]);

    //     $nodeNamespace = new NamespaceBuilder(
    //         section: $contextInput->get('section')->present()->asStudlyFormat(),
    //         container: $contextInput->get('container')->present()->asStudlyFormat(),
    //         context: 'Values',
    //         version: $contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
    //         path: Str::of(Arr::get($parent, 'classNamespacePath'))->replace('/', '\\')->prepend('\\Elements')
    //     );
    //     // dump($modelName);

    //     $nodePath = Str::of(Arr::get($parent, 'classNamespacePath'))
    //         ->after('/')
    //         // ->dump()
    //         ->replace('/', '.')
    //         ->finish('.' . $modelName)
    //         ->when($elementNodeHasSiblings, fn ($nodePath) => $nodePath->append('.*'))
    //         ->whenStartsWith('.', fn($nodePath) => $nodePath->after('.'))
    //         // ->dump()
    //         ->toString();

    //     $nodeClass = $nodeNamespace
    //         ->getFullyQualifiedClassName()
    //         ->append('\\')
    //         ->finish($modelName.'Element')
    //         ->toString();

    //     return [$nodePath => $nodeClass];
    // }

    protected static function buildAttributesNodePaths(
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
            })
            ->all();
    }
}
