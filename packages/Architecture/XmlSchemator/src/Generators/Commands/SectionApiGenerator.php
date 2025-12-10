<?php

namespace Architecture\XmlSchemator\Generators\Commands;

use Architecture\XmlSchemator\Directors;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class SectionApiGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:generate:section';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reads the `architecture-xmlSchemator.core.sections` file and iterates over each of the containers for each of the sections using the API container builder director with the respective builder director data passed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $coreSections = config('architecture-xmlSchemator.core.sections', []);
        // dump([
        //     'coreSections' => $coreSections
        // ]);
        collect($coreSections)->each(function ($sectionConfig, $sectionName) {
            // dump([
            //     'sectionConfig' => $sectionConfig,
            //     'sectionName' => $sectionName
            // ]);
            collect(Arr::get($sectionConfig, 'containers', []))
                ->each(function ($containerName) use ($sectionName) {
                    // dump([
                    //     'containerName' => $containerName,
                    //     'sectionName'   => $sectionName
                    // ]);
                    $apiContainerBuilderDirector = new Directors\ApiContainerBuilderDirector($sectionName, $containerName);
                    $this->info('Building Container');
                    // dump([
                    //     'apiContainerBuilderDirector' => $apiContainerBuilderDirector
                    // ]);
                    $apiContainerBuilderDirector->buildContainer($sectionName, $containerName);
                    // dump($apiContainerBuilderDirector->containerBuilder);
                    // dump($apiContainerBuilderDirector->serviceProviderBuilder);
                    // dd('here');
                    // $config = config("architecture-xmlSchemator.sections.sat.cfdi");
                    // dd($config);
                    $xsdSchemaSectionsConfig = config("architecture-xmlSchemator.sections.{$sectionName}.{$containerName}");
                    $xsdSchemaFilePaths = Arr::get($xsdSchemaSectionsConfig, 'versions');
                    // dd([
                    //     'xsdSchemaSectionsConfig' => $xsdSchemaSectionsConfig,
                    //     'xsdSchemaFilePaths'      => $xsdSchemaFilePaths
                    // ]);
                    collect($xsdSchemaFilePaths)
                        ->each(function ($versionConfig, $versionNumber) use ($sectionName, $containerName) {
                            $builderDirectorData = new ApiBuilderDirectorData(
                                $sectionName,
                                $containerName,
                                $versionNumber
                            );
                            // dump([
                            //     'builderDirectorData' => $builderDirectorData,
                            //     'versionConfig' => $versionConfig
                            // ]);

                            $xsdContainerBuilderDirector = new Directors\XsdContainerBuilderDirector($builderDirectorData);
                            // dd($xsdContainerBuilderDirector);
                            $this->info('Parsing and Building Xsd Structure');

                            $xsdFilePath = Arr::get($versionConfig, 'file_path');

                            $xsdStructure = $xsdContainerBuilderDirector->buildXsdStructure($xsdFilePath);

                            // dd($xsdStructure);
                            // $this->info('Building Configs');
                            // $xsdContainerBuilderDirector->buildConfigs();

                            // $this->info('Building Schemas');
                            // $xsdContainerBuilderDirector->buildSchema();

                            $this->info('Building Mapping');
                            $xsdContainerBuilderDirector->buildMapping();

                            // $this->info('Building Models');
                            // $xsdContainerBuilderDirector->buildModels();

                            // $this->info('Building Values');
                            // $xsdContainerBuilderDirector->buildValues();

                            // $this->info('Building Enums');
                            // $xsdContainerBuilderDirector->buildEnums();

                            // $this->info('Building Transformer');
                            // $xsdContainerBuilderDirector->buildTransformer();
                        });

                    // $this->info('Building ServiceProvider');
                    // $apiContainerBuilderDirector->buildServiceProvider();

                    // $this->info('Building Readme');
                    // $apiContainerBuilderDirector->buildReadme();

                    // $this->info('Building Configuration');
                    // $apiContainerBuilderDirector->buildConfiguration();


                    // $this->info('Building Repository');
                    // $apiContainerBuilderDirector->buildRepository();

                    // $this->info('Building Migration');
                    // $apiContainerBuilderDirector->buildMigration();


                    // $containerDataRoutes = config('catalogos.routes');

                    // collect($containerDataRoutes)
                    //     ->each(function ($route) use ($apiContainerBuilderDirector, $sectionName, $containerName, $modelName, $collectionName) {
                    //         $route = collect($route)
                    //             ->map(function ($field, $fieldName) use ($sectionName, $containerName, $modelName, $collectionName) {
                    //                 $field = str_replace(config('catalogos.place_holders.section_name', '{SectionName}'), $sectionName, $field);
                    //                 $field = str_replace(config('catalogos.place_holders.container_name', '{ContainerName}'), $containerName, $field);
                    //                 $field = str_replace(config('catalogos.place_holders.model_name', '{ModelName}'), $modelName, $field);
                    //                 $field = str_replace(config('catalogos.place_holders.collection_name', '{CollectionName}'), $collectionName, $field);
                    //                 return $field;
                    //             })
                    //             ->toArray();

                    //         $this->info('Building Controller');
                    //         $apiContainerBuilderDirector->buildController($route);

                    //         $this->info('Building Route');
                    //         $apiContainerBuilderDirector->buildRoute($route);

                    //         $this->info('Building Request');
                    //         $apiContainerBuilderDirector->buildRequest($route);

                    //         $this->info('Building Action');
                    //         $apiContainerBuilderDirector->buildAction($route);

                    //         $this->info('Building Task');
                    //         $apiContainerBuilderDirector->buildTask($route);

                    //         $this->info('Building UnitTest');
                    //         $apiContainerBuilderDirector->buildUnitTest($route);

                    //         $this->info('Building ApiTest');
                    //         $apiContainerBuilderDirector->buildApiTest($route);
                    //     });

                    // $this->info('Building Importer');
                    // $apiContainerBuilderDirector->buildImporter();

                    // $this->info('Building Seeder');
                    // $apiContainerBuilderDirector->buildSeeder();

                    // $this->info('Building ImportCommand');
                    // $apiContainerBuilderDirector->buildImportCommand();

                    // $this->info('Building SeedCommand');
                    // $apiContainerBuilderDirector->buildSeedCommand();
                });
        });
    }
}
