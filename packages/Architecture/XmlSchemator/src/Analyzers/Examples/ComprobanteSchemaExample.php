<?php

namespace Architecture\XmlSchemator\Analyzers\Examples;

$schema = [
	'root-path' => 'App\Containers\Sat\Cfdi\Values\\',
	'Comprobante' => [
		'xml-namespace' => 'cfdi',
		'versions'      => [
			'V33' => [
			],
			'V40' => [
				'nested-path' => 'V40\Elements\\',
				'class-name'  => 'ComprobanteElement',
				'attributes'  => [
					'Version' => [
						'nested-path' => 'Attributes\Comprobante\\',
						'class-name' => 'VersionAttribute',
					],
					'Serie' => [
						'nested-path' => 'Attributes\Comprobante\\',
						'class-name' => 'SerieAttribute',
					],
					'Folio' => [
						'nested-path' => 'Attributes\Comprobante\\',
						'class-name' => 'FolioAttribute',
					],
					'Fecha' => [
						'nested-path' => 'Attributes\Comprobante\\',
						'class-name' => 'FechaAttribute',
					],
					...
				],
				'schema' => [
					'children' => [
						'InformacionGlobal' => [
							'nested-path'   => 'Comprobante\\',
							// 'path-alias' => 'ComprobanteElements',
							'class-name'    => 'InformacionGlobalElement',
						],
						'Emisor' => [
							'nested-path' => 'Comprobante\\',
							'class-name'  => 'EmisorElement'
						],
						'Receptor' => [
							'nested-path' => 'Comprobante\\',
							'class-name'  => 'ReceptorElement'
						],
						...
						'Complemento' => [
							'nested-path' => 'Comprobante\\',
							'class-name'  => 'ComplementoElement',
							'schema' => [
								'root-path' => 'App\Containers\Sat\\',
								'children' => [
									'Nomina' => [
										'versions' => [
											'V12' => [
												'xml-namespace' => 'nomina12',
												'nested-path'   => 'Nomina\Values\V12\Elements\\',
												'class-name'    => 'NominaElement',
												'attributes' => [
													'Version' => [
														'nested-path' => '\Nomina\Values\V12\Attributes\Nomina',
														'class-name' => 'VersionAttribute',
													],
												]
											]
										]
									]
								],
								'Nomina' => [
									[
										'version-path'  => 'V12\\',
									]
									'xml-namespace' => 'nomina12',
									'root-path'     => 'App\Containers\Sat\Nomina\Values\V12\Elements\\',
									'class-name'    => 'NominaElement',
									'children-nodes' => [
									],
									'attributes' => [
										'Version' => [
											'nested-path' => 'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina',
											'class-name' => 'VersionAttribute',
										],
									]
								],
								'TimbreFiscalDigitalV11' => [],
							],
							'attributes' => [
								'NominaVersion' => [
									'root-path' => 'App\Containers\Sat\Nomina\Values\Common\Attributes\Nomina',
									'class-name' => 'VersionAttribute',
								],
								'TimbreFiscalDigitalVersion' => [
									'root-path' => 'App\Containers\Sat\Tfd\Values\Common\Attributes\TimbreFiscalDigital',
									'class-name' => 'VersionAttribute',
								],
							]
						],
					]
				]
			],
		],
	]
];
