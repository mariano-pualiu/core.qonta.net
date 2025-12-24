<?php

namespace App\Containers\ApiSection\TestContainer\Actions;

use App\Containers\ApiSection\TestContainer\Tasks\ListTestContainersTask;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\ListTestContainersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class ListTestContainersAction extends ParentAction
{
    public function __construct(
        private readonly ListTestContainersTask $listTestContainersTask,
    ) {
    }

    public function run(ListTestContainersRequest $request): mixed
    {
        return $this->listTestContainersTask->run();
    }
}
