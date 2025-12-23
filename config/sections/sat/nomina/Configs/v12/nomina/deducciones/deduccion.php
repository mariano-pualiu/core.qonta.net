<?php

return [
    'model_name' => 'Deduccion',
    'collection_name' => 'Deduccion',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones\Deduccion' => 'DeduccionAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Deducciones\DeduccionElement' => 'DeduccionElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'deducciones' => [
                    'NominaModels\Deducciones::class',
                ],
            ],
        ]
    ]
];
