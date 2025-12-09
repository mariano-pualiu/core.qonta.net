<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Pipes;

use Spatie\LaravelData\DataPipes\DataPipe;

class XmlElementImport implements DataPipe
{

    public function handle(mixed $payload, DataClass $class, Collection $properties): Collection
    {
        $service = $properties->get('service');

        $service->elementMap['{http://www.sat.gob.mx/cfd/3}Comprobante'] = [Models\Comprobante::class, 'deserializer'];
    }
}
