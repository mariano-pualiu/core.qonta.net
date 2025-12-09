<?php

return [
    'model_name'      => 'Complemento',
    'collection_name' => 'Complemento',
    'element' => [
        'namespaces' => [
            'App\Containers\Sat\Nomina\Values\Common\Attributes\Nomina'           => 'NominaAttributes',
            'App\Containers\Sat\Tfd\Values\Common\Attributes\TimbreFiscalDigital' => 'TimbreFiscalDigitalAttributes',
        ],
        'attributes' => [
            // 'ComprobanteVersion' => 'NominaAttributes\VersionAttribute',
            'NominaVersion' =>
<<<'REF'
#[WithCastable(NominaAttributes\VersionAttribute::class)]
        public NominaAttributes\VersionAttribute $NominaVersion
REF,
            'TimbreFiscalDigitalVersion' =>
<<<'REF'
#[WithCastable(TimbreFiscalDigitalAttributes\VersionAttribute::class)]
        public TimbreFiscalDigitalAttributes\VersionAttribute $TimbreFiscalDigitalVersion
REF,
        ],
    ],
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40'                                                     => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ComplementoElement'             => 'ComplementoElement',

        'App\Containers\Sat\Nomina\Models\V12'                                                   => 'NominaV12Models',
        // 'App\Containers\Architecture\XmlSchemator\Models\Contracts\NominaInterface'              => 'NominaInterface',
        'App\Containers\Sat\Nomina\Values\Common\Attributes\Nomina'                              => 'NominaAttributes',

        'App\Containers\Sat\Tfd\Models\V11'                                                      => 'TimbreFiscalDigitalV11Models',
        // 'App\Containers\Architecture\XmlSchemator\Models\Contracts\TimbreFiscalDigitalInterface' => 'TimbreFiscalDigitalInterface',
        'App\Containers\Sat\Tfd\Values\Common\Attributes\TimbreFiscalDigital'                    => 'TimbreFiscalDigitalAttributes',

        'App\Containers\Architecture\XmlSchemator\Exceptions\UnsupportedVersionException'        => 'UnsupportedVersionException',
    ],
    'implements' => [
        'App\Containers\Architecture\XmlSchemator\Models\Contracts\ComplementoInterface' => 'ComplementoInterface',
    ],
    'traits' => [],
    'properties' => [
        'fillable' => [
            'NominaVersion',
            'TimbreFiscalDigitalVersion',
        ],
        'casts' => [
            'NominaVersion' => 'NominaAttributes\VersionAttribute::class',
            'TimbreFiscalDigitalVersion' => 'TimbreFiscalDigitalAttributes\VersionAttribute::class',
        ],
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
                    'CfdiV40Models\Comprobante::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasOne' => [
                'nomina' => [
                    // 'NominaInterface::class',
                    'NominaV12Models\Nomina::class',
<<<'DEF'
$versionNomina = $nomina?->Version ?? $this->NominaVersion;

        return match ($versionNomina?->value) {
            '1.2' => $this->hasOne(NominaV12Models\Nomina::class),
            default => throw new UnsupportedVersionException(__('unsupported_version_for_nomina_node', ['version' => $versionNomina?->value])),
        };
DEF,
                ],
                'timbreFiscalDigital' => [
                    // 'TimbreFiscalDigitalInterface::class',
                    'TimbreFiscalDigitalV11Models\TimbreFiscalDigital::class',
<<<'DEF'
$versionTimbreFiscalDigital = $timbreFiscalDigital?->Version ?? $this->TimbreFiscalDigitalVersion;

        return match ($versionTimbreFiscalDigital?->value) {
            '1.1' => $this->hasOne(TimbreFiscalDigitalV11Models\TimbreFiscalDigital::class),
            default => throw new UnsupportedVersionException(__('unsupported_version_for_timbre_fiscal_digital_node', ['version' => $versionTimbreFiscalDigital?->value])),
        };
DEF,
                ],
            ],
        ]
    ]
];
