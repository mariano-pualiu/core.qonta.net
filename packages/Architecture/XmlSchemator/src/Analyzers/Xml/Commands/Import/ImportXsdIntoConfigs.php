<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands\Import;

use App\Containers\SatCfdi\CfdiV33\Models;
use App\Containers\SatCfdi\CfdiV33\Values;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits\SetsNodeElementConfigBuilder;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Sabre\Xml\Service;

class ImportXsdIntoConfigs extends Command
{
    use SetsNodeElementConfigBuilder;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:xsd:import:configs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a hirearchy of config files for the processed schema';

    // public function __construct(
    //     public ApiBuilderDirectorData $builderDirectorData
    // )
    // {
    //     $this->setElementNodeConfigBuilder(new ElementNodeConfigCommandBuilder());
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new Service();
        $service->namespaceMap['http://www.w3.org/2001/XMLSchema'] = 'xs';

        $xsd = Storage::disk('assets')->get('xsd/legacy/cfdv33.xsd');

        $schema = $service->parse($xsd);

        $this->namespacePath($schema);

        return Command::SUCCESS;
    }

    protected function namespacePath(&$nodes, $parentNamespacePath = '')
    {
        foreach ($nodes as $key => &$node) {
            $itsElementNode = Str::endsWith(Arr::get($node, 'name'), 'element');

            $elementName = $itsElementNode
                ? '/' . Arr::get($node, 'attributes.name')
                : null;

            $elementNamespace = $parentNamespacePath . $elementName;

            if(isset($node['value']) && is_array($node['value'])) {
                $this->namespacePath($node['value'], $elementNamespace);
            }

            if ($itsElementNode) {
                $node['namespacePath'] = $elementNamespace;
            }
        }
    }
}
