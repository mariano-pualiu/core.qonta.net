<?php

namespace App\Containers\ApiSection\TestContainer\Data\Repositories;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of TestContainer
 *
 * @extends ParentRepository<TModel>
 */
final class TestContainerRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
