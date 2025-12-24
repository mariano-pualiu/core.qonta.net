<?php

namespace App\Containers\ApiSection\TestContainer\Actions;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tasks\FindTestContainerByIdTask;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\FindTestContainerByIdRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindTestContainerByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindTestContainerByIdTask $findTestContainerByIdTask,
    ) {
    }

    public function run(FindTestContainerByIdRequest $request): TestContainer
    {
        return $this->findTestContainerByIdTask->run($request->id);
    }
}
