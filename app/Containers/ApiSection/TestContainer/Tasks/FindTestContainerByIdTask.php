<?php

namespace App\Containers\ApiSection\TestContainer\Tasks;

use App\Containers\ApiSection\TestContainer\Data\Repositories\TestContainerRepository;
use App\Containers\ApiSection\TestContainer\Events\TestContainerRequested;
use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class FindTestContainerByIdTask extends ParentTask
{
    public function __construct(
        private readonly TestContainerRepository $repository,
    ) {
    }

    public function run($id): TestContainer
    {
        $testContainer = $this->repository->findOrFail($id);

        TestContainerRequested::dispatch($testContainer);

        return $testContainer;
    }
}
