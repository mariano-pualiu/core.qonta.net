<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Casts;

use Architecture\XmlSchemator\Parents\Casts\ValueCast;

class ComprobanteCast implements ValueCast
{
    /**
     * Cast the given comprobante.
     *
     * @param  array<string, mixed>  $attributes
     * @return array<string, mixed>
     */
    public function get(Model $model, string $key, mixed $comprobante, array $attributes): array
    {
        return json_decode($comprobante, true);
    }

    /**
     * Prepare the given comprobante for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $comprobante, array $attributes): string
    {
        return json_encode($comprobante);
    }
}
