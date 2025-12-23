<?php

return [
    'model_name' => 'JubilacionPensionRetiro',
    'collection_name' => 'JubilacionPensionRetiro',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro' => 'JubilacionPensionRetiroAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\JubilacionPensionRetiroElement' => 'JubilacionPensionRetiroElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'percepciones' => [
                    'NominaModels\Percepciones::class',
                ],
            ],
        ]
    ]
];
