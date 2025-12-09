<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Normalizers;

use Spatie\LaravelData\Normalizers\Normalizer;

class ObjectValueNormalizer implements Normalizer
{
    public function normalize(mixed $value): ?array
    {
        if (! is_string($value)) {
            return null;
        }

        return ['value' => (object) $value];
    }
}
