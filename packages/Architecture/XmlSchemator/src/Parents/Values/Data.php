<?php

namespace Architecture\XmlSchemator\Parents\Values;

use Architecture\XmlSchemator\Parents\Casts\AttributeCast;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data as AbstractData;

abstract class Data extends AbstractData
{
    public static function castUsing(array $arguments)
    {
        return new AttributeCast(static::class, $arguments);
    }
}
