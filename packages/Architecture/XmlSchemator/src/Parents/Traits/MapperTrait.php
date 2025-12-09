<?php

namespace Architecture\XmlSchemator\Parents\Traits;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Ship\Support\MapIds;
use Illuminate\Support\Facades\Config;
// use Vinkla\Hashids\Facades\Hashids;

trait MapperTrait
{
    /**
     * endpoint to be skipped from decoding their ID's (example for external ID's)
     */
    private array $skippedEndpoints = [
        // 'orders/{id}/external',
    ];

    /**
     * Mapps the value of the `keyName` field (e.g., ID)
     *
     * Will be used by the Eloquent Models (since it's used as trait there).
     *
     * @param ?string $field The field of the model to be mapped
     * @return  mixed
     */
    public function getMappedKey(): mixed
    {
        $keyName = $this->getKeyName();

        $keyValue = $this->getAttribute($keyName);

        // map the ID only if map-id enabled in the config
        return config('apiato.map-id')
            ? MapIds::map($keyValue, get_class($this))
            : $keyValue;
    }

    // public static function map($keyValue, $keyName = null): string
    // {
    //     return MapIds::insertMappedId($keyValue, $keyName);
    // }

    // public static function demap(int $id)
    // {
    //     return MapIds::demap($id);
    // }

    /**
     * without decoding the mapd ID's you won't be able to use
     * validation features like `exists:table,id`
     * @param array $requestData
     * @return array
     * @throws IncorrectIdException
     */
    protected function demapMappedIdsBeforeValidation(array $requestData): array
    {
        // the hash ID feature must be enabled to use this demapper feature.
        if (isset($this->demap) && !empty($this->demap) && Config::get('apiato.map-id')) {
            // iterate over each key (ID that needs to be demapped) and call keys locator to demap them
            foreach ($this->demap as $key) {
                $requestData = $this->locateAndDemapIds($requestData, $key);
            }
        }

        return $requestData;
    }

    /**
     * Search the IDs to be demapped in the request data
     *
     * @param $requestData
     * @param $key
     *
     * @return  mixed
     * @throws IncorrectIdException
     */
    private function locateAndDemapIds($requestData, $key): mixed
    {
        // split the key based on the "."
        $fields = explode('.', $key);
        // loop through all elements of the key.
        return $this->processFieldMapping($requestData, $fields, $key);
    }

    /**
     * Recursive function to process (demap) the request data with a given key
     * @param $data
     * @param $keysTodo
     * @param $currentFieldName
     * @return mixed
     * @throws IncorrectIdException
     */
    private function processFieldMapping($data, $keysTodo, $currentFieldName): mixed
    {
        // check if there are no more fields to be processed
        if (empty($keysTodo)) {
            // there are no more keys left - so basically we need to demap this entry
            if ($this->skipMapIdDemap($data)) {
                return $data;
            } else {
                // $demappedField = $this->demap($data);
                $demappedField = MapIds::demap($data);

                if (empty($demappedField)) {
                    throw new IncorrectIdException('ID (' . $currentFieldName . ') is incorrect, consider using the mapped ID.');
                }

                return $demappedField;
            }
        }

        // take the first element from the field
        $field = array_shift($keysTodo);

        // is the current field an array?! we need to process it like crazy
        if ($field == '*') {
            //make sure field value is an array
            $data = is_array($data) ? $data : [$data];

            // process each field of the array (and go down one level!)
            $fields = $data;
            foreach ($fields as $key => $value) {
                $data[$key] = $this->processFieldMapping($value, $keysTodo, $currentFieldName . '[' . $key . ']');
            }
            return $data;

        }

        // check if the key we are looking for does, in fact, really exist
        if (!array_key_exists($field, $data)) {
            return $data;
        }

        // go down one level
        $value = $data[$field];
        $data[$field] = $this->processFieldMapping($value, $keysTodo, $field);

        return $data;
    }

    public function skipMapIdDemap($field): bool
    {
        return empty($field);
    }
}
