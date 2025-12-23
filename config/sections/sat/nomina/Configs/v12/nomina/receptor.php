<?php

return [
    'model_name' => 'Receptor',
    'collection_name' => 'Receptor',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Receptor' => 'ReceptorModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor' => 'ReceptorAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\ReceptorElement' => 'ReceptorElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'SubContratacion' => 'ReceptorModels\SubContratacion::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_many' => [
                'subContratacion' => [
                    'ReceptorModels\SubContratacion::class',
                ],
            ],
            'belongs_to' => [
                'nomina' => [
                    'Nominav12Models\Nomina::class',
                ],
            ],
        ]
    ]
];
