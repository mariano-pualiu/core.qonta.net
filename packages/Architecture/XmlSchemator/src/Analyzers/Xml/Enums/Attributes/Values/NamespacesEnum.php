<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules\NamespaceRule;
use ArchTech\Enums\Options;

enum NamespacesEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case CFDI_V40   = 'cfdi_v40';
    case CFDI_V33   = 'cfdi_v33';
    case NOMINA_V12 = 'nomina_v12';
    case TFD_V11    = 'tfd_v11';
    case XSI        = 'xsi';

    public function annotation(): string
    {
        return match($this)
        {
            NamespacesEnum::CFDI_V40   => 'Atributo que indica que la version del comprobante es 4.0.',
            NamespacesEnum::CFDI_V40   => 'Atributo que indica que la version del comprobante es 3.3.',
            NamespacesEnum::NOMINA_V12 => 'Atributo que indica que la version del complemento de nomina es 1.2.',
            NamespacesEnum::TFD_V11    => 'Atributo que indica que la version del complemento de timbre fiscal digital es 1.1.',
            default                    => null,
        };
    }

    public function schemaLocation(string $namespaceName): string
    {
        return match($this)
        {
            NamespacesEnum::CFDI_V40   => 'http://www.sat.gob.mx/sitio_internet/cfd/4/cfdv40.xsd',
            NamespacesEnum::CFDI_V33   => 'http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd',
            NamespacesEnum::NOMINA_V12 => 'http://www.sat.gob.mx/sitio_internet/cfd/nomina/nomina12.xsd',
            NamespacesEnum::TFD_V11    => 'http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd',
            default                    => null,
        };
    }
}
