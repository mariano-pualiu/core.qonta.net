<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Casts\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Exceptions\InvalidArgumentException;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Attributes\NamespaceAttribute;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class NamespacesCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        // dump(__METHOD__, $value);
        return collect($value)
            // ->pipe(fn ($namespaces) => dd($namespaces))
            ->map(fn ($namespace) => NamespaceAttribute::from($namespace))
            /*->dump()*/;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (! $value instanceof Collection) {
            throw new InvalidArgumentException('The given value is not a Collection instance.');
        }

        return (object) collect($value)
            ->map(fn ($namespaceAttribute) => NamespaceAttribute::from($namespaceAttribute))
            ->toArray();
    }
}
