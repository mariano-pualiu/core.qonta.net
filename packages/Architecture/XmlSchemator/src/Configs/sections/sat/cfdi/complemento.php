<?php

return [
    'model_name' => 'Complemento',
    'collection_name' => 'Complemento',
    'namespaces' => [
        // 'App\Containers\Sat\Cfdi\Models\V40'                                    => 'CfdiV40Models',
        // 'App\Containers\Sat\Cfdi\Models\V33'                                    => 'CfdiV33Models',
        'App\Containers\Sat\Nomina\Models\V12'                                  => 'NominaV12Models',
        'App\Containers\Sat\TimbreFiscalDigital\Models\V11'                     => 'TimbreFiscalDigitalV11Models',

        'App\Containers\Sat\Cfdi\Models\Contracts\ComprobanteInterface'         => 'ComprobanteInterface',
        'App\Containers\Sat\Cfdi\Models\Contracts\NominaInterface'              => 'NominaInterface',
        'App\Containers\Sat\Cfdi\Models\Contracts\TimbreFiscalDigitalInterface' => 'TimbreFiscalDigitalInterface',
        'App\Containers\Sat\Cfdi\Models\Traits\VersionedRelationshipsTrait'     => 'VersionedRelationshipsTrait'
    ],
    'traits' => [
        'App\Containers\Architecture\XmlSchemator\Analyzers\Xml\Transformers\Traits' => [
            'Traits\XmlTransformerTrait',
            'Traits\ArrayTransformerTrait',
        ],
        'App\Containers\Sat\Cfdi\Models\Contracts\ComplementoInterface' => 'ComplementoInterface',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'nomina' => 'NominaV12Models\Nomina::class',
            ],
            'http://www.sat.gob.mx/TimbreFiscalDigital' => [
                'tfd' => 'TimbreFiscalDigitalV11Models\TimbreFiscalDigital::class',
            ]
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'comprobante' => [
                    'ComprobanteInterface::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasOne' => [
                'nomina' => [
                    'NominaInterface::class',
                ],
                'timbreFiscalDigital' => [
                    'TimbreFiscalDigitalInterface::class',
                ],
            ],
        ]
    ]
];
