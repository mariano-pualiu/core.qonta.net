<?php

namespace App\Containers\ApiSection\TestContainer\Tasks;

use App\Containers\ApiSection\TestContainer\Data\Repositories\TestContainerRepository;
use App\Containers\ApiSection\TestContainer\Events\TestContainerDeleted;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class DeleteTestContainerTask extends ParentTask
{
    public function __construct(
        private readonly TestContainerRepository $repository,
    ) {
    }

    public function run($id): bool
    {
        $result = $this->repository->delete($id);

        TestContainerDeleted::dispatch($result);

        return $result;
    }
}
