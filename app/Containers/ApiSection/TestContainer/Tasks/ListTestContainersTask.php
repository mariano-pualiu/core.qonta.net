<?php

namespace App\Containers\ApiSection\TestContainer\Tasks;

use App\Containers\ApiSection\TestContainer\Data\Repositories\TestContainerRepository;
use App\Containers\ApiSection\TestContainer\Events\TestContainersListed;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class ListTestContainersTask extends ParentTask
{
    public function __construct(
        private readonly TestContainerRepository $repository,
    ) {
    }

    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();

        TestContainersListed::dispatch($result);

        return $result;
    }
}
