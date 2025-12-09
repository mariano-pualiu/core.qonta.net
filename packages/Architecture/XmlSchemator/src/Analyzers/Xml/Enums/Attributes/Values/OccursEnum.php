<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values;

use ArchTech\Enums\Options;

enum OccursEnum: string
{
    use Options;

    case UNBOUNDED = 'unbounded';

    public function limit()
    {
        return match ($this) {
            OccursEnum::UNBOUNDED => INF,
            default => null,
        };
    }
}
