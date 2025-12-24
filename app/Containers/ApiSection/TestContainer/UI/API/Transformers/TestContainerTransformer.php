<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Transformers;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

final class TestContainerTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(TestContainer $testcontainer): array
    {
        return [
            'type' => $testcontainer->getResourceKey(),
            'id' => $testcontainer->getHashedKey(),
            'created_at' => $testcontainer->created_at,
            'updated_at' => $testcontainer->updated_at,
            'readable_created_at' => $testcontainer->created_at->diffForHumans(),
            'readable_updated_at' => $testcontainer->updated_at->diffForHumans(),
        ];
    }
}
