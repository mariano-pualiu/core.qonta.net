<?php

namespace App\Containers\ApiSection\TestContainer\Data\Factories;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of TestContainer
 *
 * @extends ParentFactory<TModel>
 */
final class TestContainerFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = TestContainer::class;

    public function definition(): array
    {
        return [];
    }
}
