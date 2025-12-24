<?php

namespace App\Containers\Sat\Cfdi\UI\CLI\Commands;

// use Architecture\XmlSchemator\Analyzers\Xml\Parsers\Service;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante as CfdiV33Comprobante;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante as CfdiV40Comprobante;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaV12Nomina;
use App\Containers\Sat\Tfd\Models\V11\TimbreFiscalDigital as TfdV11TimbreFiscalDigital;
use Architecture\XmlSchemator\Analyzer\Parsers\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use Sabre\Xml\Service;

class ImportXmlIntoModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:cfdi:xml:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all the CFDIs from the `architecure-xml_schemator-assets` disk `xmls` folder into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new Service();
        $service->namespaceMap['http://www.sat.gob.mx/cfd/4']               = 'cfdi';
        $service->namespaceMap['http://www.sat.gob.mx/nomina12']            = 'nomina12';
        $service->namespaceMap['http://www.sat.gob.mx/TimbreFiscalDigital'] = 'tfd';
        $service->namespaceMap['http://www.w3.org/2000/xmlns/']             = 'xmlns';
        $service->namespaceMap['http://www.w3.org/2001/XMLSchema-instance'] = 'xsi';

        $service->elementMap = [
            '{http://www.sat.gob.mx/cfd/4}Comprobante'                          => CfdiV40Comprobante::class,
            '{http://www.sat.gob.mx/cfd/3}Comprobante'                          => CfdiV33Comprobante::class,
            '{http://www.sat.gob.mx/nomina12}Nomina'                            => NominaV12Nomina::class,
            '{http://www.sat.gob.mx/TimbreFiscalDigital}TimbreFiscalDigital'    => TfdV11TimbreFiscalDigital::class,
        ];

        // $xmlPath = Storage::disk('architecure-xml_schemator-assets')->path('xml/cfdi_v40.xml');

        $xmls = Storage::disk('architecture-xmlSchemator-assets')->files('xmls');
        // dd($xmls);
        collect($xmls)
            ->filter(fn ($file) => Str::endsWith($file, '.XML'))
            // ->take(1)
            ->each(function ($xmlFileName) use ($service) {
                $xmlPath = Storage::disk('architecture-xmlSchemator-assets')->path($xmlFileName);
                $xml = Storage::disk('architecture-xmlSchemator-assets')->get($xmlFileName);

                $comprobante = $service->parse($xml);
                // dd($comprobante);
                if ($comprobante->save()) {
                    $this->info("Successfully imported file: '{$xmlPath}'");
                    // return false;
                };
            });

        return Command::SUCCESS;
    }
}
