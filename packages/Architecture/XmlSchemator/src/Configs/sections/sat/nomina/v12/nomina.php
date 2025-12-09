<?php

return [
    'model_name'      => 'Nomina',
    'collection_name' => 'Nomina',
    'element' => [
        'namespaces' => [
            'App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante' => 'ComprobanteAttributes',
        ],
        'attributes' => [
            'ComprobanteVersion' =>
<<<'REF'
#[WithCastable(ComprobanteAttributes\VersionAttribute::class)]
        public ComprobanteAttributes\VersionAttribute $ComprobanteVersion
REF,
        ],
    ],
    'namespaces' => [
        'App\Containers\Architecture\XmlSchemator\Analyzers\Xml\Casts\Attributes\NamespacesCast' => 'NamespacesCast',

        'App\Containers\Sat\Cfdi\Models\V40'                                                     => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Models\V33'                                                     => 'CfdiV33Models',
        // 'App\Containers\Architecture\XmlSchemator\Models\Contracts\ComplementoInterface'         => 'ComplementoInterface',

        'App\Containers\Sat\Nomina\Models\V12\Nomina'                                            => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina'                                 => 'NominaAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\NominaElement'                            => 'NominaElement',

        'App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante'                           => 'ComprobanteAttributes',

        'App\Containers\Architecture\XmlSchemator\Exceptions\UnsupportedVersionException'        => 'UnsupportedVersionException',
    ],
    'implements' => [
        'App\Containers\Architecture\XmlSchemator\Models\Contracts\NominaInterface' => 'NominaInterface',
    ],
    'traits' => [],
    'properties' => [
        'fillable' => [
            'ComprobanteVersion',
        ],
        'casts' => [
            'ComprobanteVersion' => 'ComprobanteAttributes\VersionAttribute::class',
        ],
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'Emisor'        => 'NominaModels\Emisor::class',
                'Receptor'      => 'NominaModels\Receptor::class',
                'Percepciones'  => 'NominaModels\Percepciones::class',
                'Deducciones'   => 'NominaModels\Deducciones::class',
                'OtrosPagos'    => 'NominaModels\OtrosPagos::class',
                'Incapacidades' => 'NominaModels\Incapacidades::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'complemento' => [
                    // 'ComplementoInterface::class',
                    [
                        'CfdiV40Models\Comprobante\Complemento::class',
                        'CfdiV33Models\Comprobante\Complemento::class'
                    ],
<<<'DEF'
$versionComplemento = match (get_class($complemento)::XML_NAMESPACE) {
            'http://www.sat.gob.mx/cfd/4'  => '4.0',
            'http://www.sat.gob.mx/cfd/33' => '3.3',
            default                        => $this->ComprobanteVersion?->value,
        };

        return match ($versionComplemento) {
            '3.3'   => $this->belongsTo(CfdiV40Models\Comprobante\Complemento::class),
            '4.0'   => $this->belongsTo(CfdiV33Models\Comprobante\Complemento::class),
            default => throw new UnsupportedVersionException(__('unsupported_version_for_complemento_node', ['version' => $versionComplemento])),
        };
DEF,
                ],
            ],
            'MongoDB\Laravel\Relations\HasOne' => [
                'emisor' => [
                    'NominaModels\Emisor::class',
                ],
                'receptor' => [
                    'NominaModels\Receptor::class',
                ],
                'percepciones' => [
                    'NominaModels\Percepciones::class',
                ],
                'deducciones' => [
                    'NominaModels\Deducciones::class',
                ],
                'otrosPagos' => [
                    'NominaModels\OtrosPagos::class',
                ],
                'incapacidades' => [
                    'NominaModels\Incapacidades::class',
                ],
            ],
        ]
    ]
];
