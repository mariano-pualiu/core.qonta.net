<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Pipes;

use Spatie\LaravelData\DataPipes\DataPipe;

class InitImportXmlService implements DataPipe
{

    public function handle(mixed $payload, DataClass $class, Collection $properties): Collection
    {
        $service = new Sabre\Xml\Service();

        $service->namespaceMap['http://www.sat.gob.mx/cfd/3'] = 'cfdi';

        $properties->put('service', $service);
    }
}
