<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;

enum CatCFDIEnum: string implements SimpleTypeEnumContract
{
    use Options;

    case C_FormaPago         = 'catCFDI:c_FormaPago';
    case C_Moneda            = 'catCFDI:c_Moneda';
    case C_TipoDeComprobante = 'catCFDI:c_TipoDeComprobante';
    case C_Exportacion       = 'catCFDI:c_Exportacion';
    case C_MetodoPago        = 'catCFDI:c_MetodoPago';
    case C_CodigoPostal      = 'catCFDI:c_CodigoPostal';
    case C_Periodicidad      = 'catCFDI:c_Periodicidad';
    case C_Meses             = 'catCFDI:c_Meses';
    case C_TipoRelacion      = 'catCFDI:c_TipoRelacion';
    case C_RegimenFiscal     = 'catCFDI:c_RegimenFiscal';
    case C_Pais              = 'catCFDI:c_Pais';
    case C_UsoCFDI           = 'catCFDI:c_UsoCFDI';
    case C_ClaveProdServ     = 'catCFDI:c_ClaveProdServ';
    case C_ClaveUnidad       = 'catCFDI:c_ClaveUnidad';
    case C_ObjetoImp         = 'catCFDI:c_ObjetoImp';
    case C_Impuesto          = 'catCFDI:c_Impuesto';
    case C_TipoFactor        = 'catCFDI:c_TipoFactor';
    case C_Estado            = 'catCFDI:c_Estado';
    case C_Colonia           = 'catCFDI:c_Colonia';
    case C_Localidad         = 'catCFDI:c_Localidad';
    case C_Municipio         = 'catCFDI:c_Municipio';

    public function base(): BaseEnum
    {
        return match($this)
        {
            CatCFDIEnum::C_FormaPago         => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Moneda            => BaseEnum::XS_STRING,
            CatCFDIEnum::C_TipoDeComprobante => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Exportacion       => BaseEnum::XS_STRING,
            CatCFDIEnum::C_MetodoPago        => BaseEnum::XS_STRING,
            CatCFDIEnum::C_CodigoPostal      => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Periodicidad      => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Meses             => BaseEnum::XS_STRING,
            CatCFDIEnum::C_TipoRelacion      => BaseEnum::XS_STRING,
            CatCFDIEnum::C_RegimenFiscal     => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Pais              => BaseEnum::XS_STRING,
            CatCFDIEnum::C_UsoCFDI           => BaseEnum::XS_STRING,
            CatCFDIEnum::C_ClaveProdServ     => BaseEnum::XS_STRING,
            CatCFDIEnum::C_ClaveUnidad       => BaseEnum::XS_STRING,
            CatCFDIEnum::C_ObjetoImp         => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Impuesto          => BaseEnum::XS_STRING,
            CatCFDIEnum::C_TipoFactor        => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Estado            => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Colonia           => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Localidad         => BaseEnum::XS_STRING,
            CatCFDIEnum::C_Municipio         => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            CatCFDIEnum::C_FormaPago         => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03","04","05","06","08","12","13","14","15","17","23","24","25","26","27","28","29","30","31","99"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Moneda            => [
                // 178
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "AED","AFN","ALL","AMD","ANG","AOA","ARS","AUD","AWG","AZN","BAM","BBD","BDT","BGN","BHD","BIF","BMD","BND","BOB","BOV","BRL","BSD","BTN","BWP","BYR","BZD","CAD","CDF","CHE","CHF","CHW","CLF","CLP","CNY","COP","COU","CRC","CUC","CUP","CVE","CZK","DJF","DKK","DOP","DZD","EGP","ERN","ETB","EUR","FJD","FKP","GBP","GEL","GHS","GIP","GMD","GNF","GTQ","GYD","HKD","HNL","HRK","HTG","HUF","IDR","ILS","INR","IQD","IRR","ISK","JMD","JOD","JPY","KES","KGS","KHR","KMF","KPW","KRW","KWD","KYD","KZT","LAK","LBP","LKR","LRD","LSL","LYD","MAD","MDL","MGA","MKD","MMK","MNT","MOP","MRO","MUR","MVR","MWK","MXN","MXV","MYR","MZN","NAD","NGN","NIO","NOK","NPR","NZD","OMR","PAB","PEN","PGK","PHP","PKR","PLN","PYG","QAR","RON","RSD","RUB","RWF","SAR","SBD","SCR","SDG","SEK","SGD","SHP","SLL","SOS","SRD","SSP","STD","SVC","SYP","SZL","THB","TJS","TMT","TND","TOP","TRY","TTD","TWD","TZS","UAH","UGX","USD","USN","UYI","UYU","UZS","VEF","VND","VUV","WST","XAF","XAG","XAU","XBA","XBB","XBC","XBD","XCD","XDR","XOF","XPD","XPF","XPT","XSU","XTS","XUA","XXX","YER","ZAR","ZMW","ZWL"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_TipoDeComprobante => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "I","E","T","N","P"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Exportacion       => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03","04"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_MetodoPago        => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "PUE","PPD"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_CodigoPostal      => [
                // Rules\EnumerationRule::class => new Rules\EnumerationRule(),        // TODO:implement validation rules via Microservices API
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Periodicidad      => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03","04","05"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Meses             => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 18
                    "01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_TipoRelacion      => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03","04","05","06","07","08","09"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_RegimenFiscal     => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 23
                    "601","603","605","606","607","608","609","610","611","612","614","615","616","620","621","622","623","624","625","626","628","629","630"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Pais              => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 250
                    "AFG","ALA","ALB","DEU","AND","AGO","AIA","ATA","ATG","SAU","DZA","ARG","ARM","ABW","AUS","AUT","AZE","BHS","BGD","BRB","BHR","BEL","BLZ","BEN","BMU","BLR","MMR","BOL","BIH","BWA","BRA","BRN","BGR","BFA","BDI","BTN","CPV","KHM","CMR","CAN","QAT","BES","TCD","CHL","CHN","CYP","COL","COM","PRK","KOR","CIV","CRI","HRV","CUB","CUW","DNK","DMA","ECU","EGY","SLV","ARE","ERI","SVK","SVN","ESP","USA","EST","ETH","PHL","FIN","FJI","FRA","GAB","GMB","GEO","GHA","GIB","GRD","GRC","GRL","GLP","GUM","GTM","GUF","GGY","GIN","GNB","GNQ","GUY","HTI","HND","HKG","HUN","IND","IDN","IRQ","IRN","IRL","BVT","IMN","CXR","NFK","ISL","CYM","CCK","COK","FRO","SGS","HMD","FLK","MNP","MHL","PCN","SLB","TCA","UMI","VGB","VIR","ISR","ITA","JAM","JPN","JEY","JOR","KAZ","KEN","KGZ","KIR","KWT","LAO","LSO","LVA","LBN","LBR","LBY","LIE","LTU","LUX","MAC","MDG","MYS","MWI","MDV","MLI","MLT","MAR","MTQ","MUS","MRT","MYT","MEX","FSM","MDA","MCO","MNG","MNE","MSR","MOZ","NAM","NRU","NPL","NIC","NER","NGA","NIU","NOR","NCL","NZL","OMN","NLD","PAK","PLW","PSE","PAN","PNG","PRY","PER","PYF","POL","PRT","PRI","GBR","CAF","CZE","MKD","COG","COD","DOM","REU","RWA","ROU","RUS","ESH","WSM","ASM","BLM","KNA","SMR","MAF","SPM","VCT","SHN","LCA","STP","SEN","SRB","SYC","SLE","SGP","SXM","SYR","SOM","LKA","SWZ","ZAF","SDN","SSD","SWE","CHE","SUR","SJM","THA","TWN","TZA","TJK","IOT","ATF","TLS","TGO","TKL","TON","TTO","TUN","TKM","TUR","TUV","UKR","UGA","URY","UZB","VUT","VAT","VEN","VNM","WLF","YEM","DJI","ZMB","ZWE","ZZZ"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_UsoCFDI           => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 25
                    "G01","G02","G03","I01","I02","I03","I04","I05","I06","I07","I08","D01","D02","D03","D04","D05","D06","D07","D08","D09","D10","P01","S01","CP01","CN01"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_ClaveProdServ     => [
                // Rules\EnumerationRule::class => new Rules\EnumerationRule(),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_ClaveUnidad       => [
                // Rules\EnumerationRule::class => new Rules\EnumerationRule(),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_ObjetoImp         => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Impuesto          => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "001","002","003"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_TipoFactor        => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "Tasa","Cuota","Exento"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Estado            => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 96
                    "AGU","BCN","BCS","CAM","CHP","CHH","COA","COL","DIF","CMX","DUR","GUA","GRO","HID","JAL","MEX","MIC","MOR","NAY","NLE","OAX","PUE","QUE","ROO","SLP","SIN","SON","TAB","TAM","TLA","VER","YUC","ZAC","AL","AK","AZ","AR","CA","NC","SC","CO","CT","ND","SD","DE","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NJ","NY","NH","NM","OH","OK","OR","PA","RI","TN","TX","UT","VT","VA","WV","WA","WI","WY","ON","QC","NS","NB","MB","BC","PE","SK","AB","NL","NT","YT","UN"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Colonia           => [
                // Rules\EnumerationRule::class => new Rules\EnumerationRule(),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Localidad         => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 66
                    "01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","66","67","68","69"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatCFDIEnum::C_Municipio         => [
                // Rules\EnumerationRule::class => new Rules\EnumerationRule(),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
        };
    }
}
