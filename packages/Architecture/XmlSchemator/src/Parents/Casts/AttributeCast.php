<?php

namespace Architecture\XmlSchemator\Parents\Casts;

use Architecture\XmlSchemator\Parents\Casts\ValueCast;
use Spatie\LaravelData\Contracts\BaseData;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Exceptions\CannotCastData;

class AttributeCast extends ValueCast
{
    public function __construct(
        /** @var class-string<\Spatie\LaravelData\Contracts\BaseData> $dataClass */
        protected string $dataClass,
        /** @var string[] $arguments */
        protected array $arguments = []
    ) {
    }

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return Money
     */
    public function get($model, string $key, $value, array $attributes): ?BaseData
    {
        if (is_null($value) && in_array('default', $this->arguments)) {
            $value = '{}';
        }

        if ($value === null) {
            return null;
        }

        $payload = is_string($value)
            ? json_decode($value, true, flags: JSON_THROW_ON_ERROR)
            : $value;

        return ($this->dataClass)::from($payload);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  \App\Address  $value
     * @param  array  $attributes
     * @return array
     */
    public function set($model, string $key, $value, array $attributes)/*: ?string*/
    {
        if ($value === null) {
            return null;
        }

        if (is_array($value)) {
            $value = ($this->dataClass)::from($value);
        }

        if (! $value instanceof BaseData) {
            throw CannotCastData::shouldBeData($model::class, $key);
        }

        if (! $value instanceof TransformableData) {
            throw CannotCastData::shouldBeTransformableData($model::class, $key);
        }

        return $value /*?? ['value' => null]*/;
    }
}
