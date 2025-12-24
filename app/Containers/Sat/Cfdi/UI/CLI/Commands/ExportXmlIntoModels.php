<?php

namespace App\Containers\Sat\Cfdi\UI\CLI\Commands;

use App\Containers\Sat\Cfdi\Models\V40\Comprobante;
use App\Containers\Sat\NominaV12\Models as NominaModels;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Sabre\Xml\Service;

class ExportXmlIntoModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:cfdi:xml:export';

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

        $comprobante = Comprobante::first();

        $service->namespaceMap = $comprobante->Namespaces
            ->mapWithKeys(fn ($namespace) => [$namespace->value => $namespace->name])
            ->toArray();

        $comprobante->load('complemento');

        $xml = $service->write(
            '{http://www.sat.gob.mx/cfd/4}Comprobante',
            $comprobante
        );

        dd($xml);

        // $xml = $service->write();

        Storage::disk('assets')->put('xml/restored/cdfi_v40.xml', $xml);
        dump($xml);
        // dd($comprobante->save());

        return Command::SUCCESS;
    }

    // $service->classMap['AtomEntry'] = function(Sabre\Xml\Writer $writer, $entry) {
    //     $ns = '{http://www.w3.org/2005/Atom}';

    //     $writer->write([
    //         $ns . 'title' => $entry->title,
    //         [
    //            'name' => $ns . 'link',
    //            'attributes' => ['href' => $entry->link]
    //         ],
    //         $ns . 'updated' => $entry->updated,
    //         $ns . 'id' => 'urn:uuid:1225c695-cfb8-4ebb-aaaa-80da344efa6a',
    //         $ns . 'summary' => 'Some text.'
    //     ]);
    // };
}
