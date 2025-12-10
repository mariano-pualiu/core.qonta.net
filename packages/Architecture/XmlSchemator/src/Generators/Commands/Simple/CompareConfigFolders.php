<?php

namespace Architecture\XmlSchemator\Generators\Commands\Simple;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class CompareConfigFolders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compare:config:files';

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
        // $subPath = '.comprobante.conceptos.concepto.impuestos.retenciones';
        $subPath = '.comprobante.impuestos.retenciones.retencion';
        dd(array_values(array_unique(array_filter(
            Arr::dot(config('sections.sat.cfdi_v40.configs.comprobante')),
            fn ($value, $key) => str_contains($key, 'model_name'),
            ARRAY_FILTER_USE_BOTH
        ))));

        // $field = 'relationships';
        $field = 'collection_name';
        dump(config('sections.sat.old_cfdi_v33'.$subPath));
        dump(config('sections.sat.cfdi_v33.configs'.$subPath));
        $old_cfdi_v33_configs = Arr::pluck(config('sections.sat.old_cfdi_v33'.$subPath), $field, 'model_name');

        $cfdi_v33_configs = Arr::pluck(config('sections.sat.cfdi_v33.configs'.$subPath), $field, 'model_name');

        dd([
            'old_cfdi_v33_configs' => $old_cfdi_v33_configs,
            'cfdi_v33_configs' => $cfdi_v33_configs
        ]);

        return Command::SUCCESS;
    }
}
