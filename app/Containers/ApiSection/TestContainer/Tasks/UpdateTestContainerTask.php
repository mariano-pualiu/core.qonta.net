<?php

namespace App\Containers\ApiSection\TestContainer\Tasks;

use App\Containers\ApiSection\TestContainer\Data\Repositories\TestContainerRepository;
use App\Containers\ApiSection\TestContainer\Events\TestContainerUpdated;
use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class UpdateTestContainerTask extends ParentTask
{
    public function __construct(
        private readonly TestContainerRepository $repository,
    ) {
    }

    public function run(array $data, $id): TestContainer
    {
        $testContainer = $this->repository->update($data, $id);

        TestContainerUpdated::dispatch($testContainer);

        return $testContainer;
    }
}
