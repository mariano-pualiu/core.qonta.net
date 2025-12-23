<?php

return [
    'model_name' => 'Deducciones',
    'collection_name' => 'Deducciones',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Deducciones' => 'DeduccionesModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones' => 'DeduccionesAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\DeduccionesElement' => 'DeduccionesElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'Deduccion' => 'DeduccionesModels\Deduccion::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'deduccion' => [
                    'DeduccionesModels\Deduccion::class',
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
