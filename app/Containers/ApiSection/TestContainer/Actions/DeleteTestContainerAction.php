<?php

namespace App\Containers\ApiSection\TestContainer\Actions;

use App\Containers\ApiSection\TestContainer\Tasks\DeleteTestContainerTask;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\DeleteTestContainerRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteTestContainerAction extends ParentAction
{
    public function __construct(
        private readonly DeleteTestContainerTask $deleteTestContainerTask,
    ) {
    }

    public function run(DeleteTestContainerRequest $request): bool
    {
        return $this->deleteTestContainerTask->run($request->id);
    }
}
