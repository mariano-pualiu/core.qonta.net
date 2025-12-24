<?php

namespace App\Containers\ApiSection\TestContainer\Tasks;

use App\Containers\ApiSection\TestContainer\Data\Repositories\TestContainerRepository;
use App\Containers\ApiSection\TestContainer\Events\TestContainerCreated;
use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class CreateTestContainerTask extends ParentTask
{
    public function __construct(
        private readonly TestContainerRepository $repository,
    ) {
    }

    public function run(array $data): TestContainer
    {
        $testContainer = $this->repository->create($data);

        TestContainerCreated::dispatch($testContainer);

        return $testContainer;
    }
}
