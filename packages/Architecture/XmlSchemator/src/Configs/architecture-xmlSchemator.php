<?php

use App\Ship\Commands;

return [

    /*
    |--------------------------------------------------------------------------
    | Architecture Section XmlSchemator Container
    |--------------------------------------------------------------------------
    |
    */

    'disks' => [
        'assets' => [
            'driver' => 'local',
            'root' => dirname(__DIR__) . '/Data/Assets',
        ],
    ],
    'testing' => [
        'seeders' => [
            // 'seed:inegi:entidades'
        ],
    ],
    'core' => [
        'place_holders' => [
            'section_name' => env('PLACEHOLDER_SECTION_NAME', '{SectionName}'),
            'container_name' => env('PLACEHOLDER_CONTAINER_NAME', '{ContainerName}'),
            'model_name' => env('PLACEHOLDER_MODEL_NAME', '{ModelName}'),
            'collection_name' => env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}'),
        ],
        'doc_version' => env('DOC_VERSION_NUMBER', 1),
        'api_accesibility' => env('API_ACCESIBILITY', 'private'),
        'ui_type' => env('UI_TYPE', 'api'),
        'sections' => [
            'sat' => [
                'containers' => [
                    'cfdi',
                    'nomina',
                    'tfd',
                ],
            ],
            'gestion' => [
                'containers' => [
                    'laboral',
                    'tributaria',
                ]
            ]
        ],
        'routes' => [
            [
                'stub'       => 'Find',
                'name'       => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById',
                'controller' => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ByIdController',
                'operation'  => 'find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById',
                'type'       => env('API_ACCESIBILITY', 'private'),
                'verb'       => 'GET',
                'url'        => /*$url .*/ '/{id}',
                'action'     => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById' . 'Action',
                'unit_test'  => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById' . 'ActionTest',
                'request'    => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById' . 'Request',
                'task'       => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById' . 'Task',
                'api_test'   => 'Find' . env('PLACEHOLDER_MODEL_NAME', '{ModelName}') . 'ById' . 'Test',
                'test_stub'  => 'action/find',
            ],
            [
                'stub'       => 'GetAll',
                'name'       => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}'),
                'controller' => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}') . 'Controller',
                'operation'  => 'getAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}'),
                'type'       => env('API_ACCESIBILITY', 'private'),
                'verb'       => 'GET',
                'url'        => /*$url .*/ '',
                'action'     => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}') . 'Action',
                'unit_test'  => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}') . 'ActionTest',
                'request'    => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}') . 'Request',
                'task'       => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}') . 'Task',
                'api_test'   => 'GetAll' . env('PLACEHOLDER_COLLECTION_NAME', '{CollectionName}') . 'Test',
                'test_stub'  => 'action/get_all',
            ],
        ],
        'regenerate_file_types' => [
            // Commands\ModelGenerator::FILE_TYPE,
            // Commands\ActionGenerator::FILE_TYPE,
            // Commands\CommandGenerator::FILE_TYPE,
            // Commands\ComposerGenerator::FILE_TYPE,
            // Commands\ConfigurationGenerator::FILE_TYPE,
            // Commands\ContainerGenerator::FILE_TYPE,
            // Commands\ControllerGenerator::FILE_TYPE,
            // Commands\ImporterGenerator::FILE_TYPE,
            // Commands\RepositoryGenerator::FILE_TYPE,
            // Commands\RequestGenerator::FILE_TYPE,
            // Commands\RouteGenerator::FILE_TYPE,
            // Commands\SeederGenerator::FILE_TYPE,
            // Commands\ServiceProviderGenerator::FILE_TYPE,
            // Commands\TaskGenerator::FILE_TYPE,
            // Commands\TestGenericTestCaseGenerator::FILE_TYPE,
            // Commands\TestApiTestGenerator::FILE_TYPE,
            // Commands\TestUnitTestGenerator::FILE_TYPE,
            // // Commands\MigrationGenerator::FILE_TYPE,
            // // Commands\TransformerGenerator::FILE_TYPE,
            // // Commands\ContainerApiGenerator::FILE_TYPE, // not used
        ],
    ]
];
