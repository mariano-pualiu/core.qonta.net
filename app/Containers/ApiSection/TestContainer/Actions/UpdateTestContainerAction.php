<?php

namespace App\Containers\ApiSection\TestContainer\Actions;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tasks\UpdateTestContainerTask;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\UpdateTestContainerRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateTestContainerAction extends ParentAction
{
    public function __construct(
        private readonly UpdateTestContainerTask $updateTestContainerTask,
    ) {
    }

    public function run(UpdateTestContainerRequest $request): TestContainer
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->updateTestContainerTask->run($data, $request->id);
    }
}
