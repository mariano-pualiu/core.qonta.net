<?php

namespace Architecture\XmlSchemator\Parents\Traits;

use Apiato\Core\Exceptions\IncorrectIdException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Vinkla\Hashids\Facades\Hashids;

trait CasterTrait
{
    /**
     * endpoint to be skipped from decoding their ID's (example for external ID's)
     */
    private array $skippedEndpoints = [
        // 'orders/{id}/external',
    ];

    /**
     * Casts the provided data of a request.
     *
     * @param array $data a list of fields to be casted from
     * @param array $casts a list of cast classes to be data fields casted into
     *
     * @return array an array containing the values of the casted fields
     * @throws IncorrectIdException
     */
    public function castInput(array $data, array $casts = null): array
    {
        // if no key is set, use the default key name (i.e., id)
        if ($casts === null) {
            $casts = $this->casts();
        }

        $inputCasted = [];

        foreach ($data as $fieldName => $value) {
            if ($castClassName = Arr::get($casts, $fieldName)) {
                $castedField = new $castClassName($value);

                Arr::set($inputCasted, $fieldName, $castedField);
            }
        }

        return $inputCasted;
    }
}
