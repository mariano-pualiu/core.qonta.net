<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Pipes;

use Illuminate\Support\Collection;
use Spatie\LaravelData\DataPipes\DataPipe;
use Spatie\LaravelData\Support\DataClass;

class SetElementsPipe extends DataPipe
{
    public function handle(mixed $payload, DataClass $class, Collection $properties): Collection
    {
        $xml = $properties->get('xml');
    }
}
