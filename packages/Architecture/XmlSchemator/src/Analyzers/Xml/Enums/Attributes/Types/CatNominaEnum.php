<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;

enum CatNominaEnum: string implements SimpleTypeEnumContract
{
    use Options;

    case C_Banco            = 'catNomina:c_Banco';
    case C_OrigenRecurso    = 'catNomina:c_OrigenRecurso';
    case C_PeriodicidadPago = 'catNomina:c_PeriodicidadPago';
    case C_TipoContrato     = 'catNomina:c_TipoContrato';
    case C_TipoDeduccion    = 'catNomina:c_TipoDeduccion';
    case C_TipoHoras        = 'catNomina:c_TipoHoras';
    case C_TipoIncapacidad  = 'catNomina:c_TipoIncapacidad';
    case C_TipoJornada      = 'catNomina:c_TipoJornada';
    case C_TipoNomina       = 'catNomina:c_TipoNomina';
    case C_TipoOtroPago     = 'catNomina:c_TipoOtroPago';
    case C_TipoPercepcion   = 'catNomina:c_TipoPercepcion';
    case C_TipoRegimen      = 'catNomina:c_TipoRegimen';
    case C_RiesgoPuesto     = 'catNomina:c_RiesgoPuesto';

    public function base(): BaseEnum
    {
        return match($this)
        {
            CatNominaEnum::C_Banco            => BaseEnum::XS_STRING,
            CatNominaEnum::C_OrigenRecurso    => BaseEnum::XS_STRING,
            CatNominaEnum::C_PeriodicidadPago => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoContrato     => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoDeduccion    => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoHoras        => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoIncapacidad  => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoJornada      => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoNomina       => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoOtroPago     => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoPercepcion   => BaseEnum::XS_STRING,
            CatNominaEnum::C_TipoRegimen      => BaseEnum::XS_STRING,
            CatNominaEnum::C_RiesgoPuesto     => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            CatNominaEnum::C_Banco            => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "002","006","009","012","014","019","021","030","032","036","037","042","044","058","059","060","062","072","102","103","106","108","110","112","113","116","124","126","127","128","129","130","131","132","133","134","135","136","137","138","139","140","141","143","145","147","148","149","150","151","152","153","154","155","156","157","158","159","160","166","168","600","601","602","605","606","607","608","610","614","615","616","617","618","619","620","621","622","623","626","627","628","629","630","631","632","633","634","636","637","638","640","642","646","647","648","649","651","652","653","655","656","659","670","901","902"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_OrigenRecurso    => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "IP","IF","IM"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_PeriodicidadPago => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 11
                    "01","02","03","04","05","06","07","08","09","10","99"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoContrato     => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 11
                    "01","02","03","04","05","06","07","08","09","10","99"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoDeduccion    => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 107
                    "001","002","003","004","005","006","007","008","009","010","011","012","013","014","015","016","017","018","019","020","021","022","023","024","025","026","027","028","029","030","031","032","033","034","035","036","037","038","039","040","041","042","043","044","045","046","047","048","049","050","051","052","053","054","055","056","057","058","059","060","061","062","063","064","065","066","067","068","069","070","071","072","073","074","075","076","077","078","079","080","081","082","083","084","085","086","087","088","089","090","091","092","093","094","095","096","097","098","099","100","101","102","103","104","105","106","107"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoHoras        => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoIncapacidad  => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "01","02","03","04"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoJornada      => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 9
                    "01","02","03","04","05","06","07","08","99"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoNomina       => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    "O","E"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoOtroPago     => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 10
                    "001","002","003","004","005","006","007","008","009","999"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoPercepcion   => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 44
                    "001","002","003","004","005","006","009","010","011","012","013","014","015","019","020","021","022","023","024","025","026","027","028","029","030","031","032","033","034","035","036","037","038","039","044","045","046","047","048","049","050","051","052","053"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_TipoRegimen      => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 13
                    "02","03","04","05","06","07","08","09","10","11","12","13","99"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
            CatNominaEnum::C_RiesgoPuesto     => [
                Rules\EnumerationRule::class => new Rules\EnumerationRule([
                    // 6
                    "1","2","3","4","5","99"
                ]),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse')
            ],
        };
    }

    public function availableOptions(): array
    {
        return match($this)
        {
            CatNominaEnum::C_Banco            => ["002","006","009","012","014","019","021","030","032","036","037","042","044","058","059","060","062","072","102","103","106","108","110","112","113","116","124","126","127","128","129","130","131","132","133","134","135","136","137","138","139","140","141","143","145","147","148","149","150","151","152","153","154","155","156","157","158","159","160","166","168","600","601","602","605","606","607","608","610","614","615","616","617","618","619","620","621","622","623","626","627","628","629","630","631","632","633","634","636","637","638","640","642","646","647","648","649","651","652","653","655","656","659","670","901","902"],
            CatNominaEnum::C_OrigenRecurso    => ["IP","IF","IM"],
            CatNominaEnum::C_PeriodicidadPago => ["01","02","03","04","05","06","07","08","09","10","99"],
            CatNominaEnum::C_TipoContrato     => [
                ['id' => '01', 'name' => '[01] Contrato de trabajo por tiempo indeterminado'],
                ['id' => '02', 'name' => '[02] Contrato de trabajo para obra determinada'],
                ['id' => '03', 'name' => '[03] Contrato de trabajo por tiempo determinado'],
                ['id' => '04', 'name' => '[04] Contrato de trabajo por temporada'],
                ['id' => '05', 'name' => '[05] Contrato de trabajo sujeto a prueba'],
                ['id' => '06', 'name' => '[06] Contrato de trabajo con capacitación inicial'],
                ['id' => '07', 'name' => '[07] Modalidad de contratación por pago de hora laborada'],
                ['id' => '08', 'name' => '[08] Modalidad de trabajo por comisión laboral'],
                ['id' => '09', 'name' => '[09] Modalidades de contratación donde no existe relación de trabajo'],
                ['id' => '10', 'name' => '[10] Jubilación, pensión, retiro.'],
                ['id' => '99', 'name' => '[99] Otro contrato'],
            ],
            CatNominaEnum::C_TipoDeduccion    => ["001","002","003","004","005","006","007","008","009","010","011","012","013","014","015","016","017","018","019","020","021","022","023","024","025","026","027","028","029","030","031","032","033","034","035","036","037","038","039","040","041","042","043","044","045","046","047","048","049","050","051","052","053","054","055","056","057","058","059","060","061","062","063","064","065","066","067","068","069","070","071","072","073","074","075","076","077","078","079","080","081","082","083","084","085","086","087","088","089","090","091","092","093","094","095","096","097","098","099","100","101","102","103","104","105","106","107"],
            CatNominaEnum::C_TipoHoras        => ["01","02","03"],
            CatNominaEnum::C_TipoIncapacidad  => ["01","02","03","04"],
            CatNominaEnum::C_TipoJornada      => ["01","02","03","04","05","06","07","08","99"],
            CatNominaEnum::C_TipoNomina       => ["O","E"],
            CatNominaEnum::C_TipoOtroPago     => ["001","002","003","004","005","006","007","008","009","999"],
            CatNominaEnum::C_TipoPercepcion   => ["001","002","003","004","005","006","009","010","011","012","013","014","015","019","020","021","022","023","024","025","026","027","028","029","030","031","032","033","034","035","036","037","038","039","044","045","046","047","048","049","050","051","052","053"],
            CatNominaEnum::C_TipoRegimen      => ["02","03","04","05","06","07","08","09","10","11","12","13","99"],
            CatNominaEnum::C_RiesgoPuesto     => ["1","2","3","4","5","99"],
        };
    }
}
