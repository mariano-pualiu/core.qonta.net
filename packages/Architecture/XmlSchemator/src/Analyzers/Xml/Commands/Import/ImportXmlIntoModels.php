<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands\Import;

use App\Containers\SatCfdi\CfdiV33\Models;
use App\Containers\SatCfdi\CfdiV33\Values;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Sabre\Xml\Service;

class ImportXmlIntoModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:xml:import:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new Service();
        $service->namespaceMap['http://www.sat.gob.mx/cfd/3'] = 'cfdi';
        // $service->mapValueObject();

        $service->elementMap = [
            '{http://www.sat.gob.mx/cfd/3}Comprobante'         => [Models\Comprobante::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Emisor'              => [Models\Comprobante\Emisor::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Receptor'            => [Models\Comprobante\Receptor::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Complemento'         => [Models\Comprobante\Complemento::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}CfdiRelacionados'    => [Models\Comprobante\CfdiRelacionados::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}CfdiRelacionado'     => [Models\Comprobante\CfdiRelacionados\CfdiRelacionado::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Conceptos'           => [Models\Comprobante\Conceptos::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Concepto'            => [Models\Comprobante\Conceptos\Concepto::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}CuentaPredial'       => [Models\Comprobante\Conceptos\Concepto\CuentaPredial::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}ComplementoConcepto' => [Models\Comprobante\Conceptos\Concepto\ComplementoConcepto::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}InformacionAduanera' => [Models\Comprobante\Conceptos\Concepto\InformacionAduanera::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Parte'               => [Models\Comprobante\Conceptos\Concepto\Parte::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Impuestos'           => [Models\Comprobante\Impuestos::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Retenciones'         => [Models\Comprobante\Impuestos\Retenciones::class, 'deserializer'],
            '{http://www.sat.gob.mx/cfd/3}Traslados'           => [Models\Comprobante\Impuestos\Traslados::class, 'deserializer'],
        ];

        $xml = Storage::disk('assets')->get('xml/cfdi_v33.xml');

        $comprobante = $service->parse($xml);
        dd($comprobante->save());

        return Command::SUCCESS;
    }
}
