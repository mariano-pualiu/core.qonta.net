<?php

namespace App\Containers\ApiSection\TestContainer\Actions;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tasks\CreateTestContainerTask;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\CreateTestContainerRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateTestContainerAction extends ParentAction
{
    public function __construct(
        private readonly CreateTestContainerTask $createTestContainerTask,
    ) {
    }

    public function run(CreateTestContainerRequest $request): TestContainer
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->createTestContainerTask->run($data);
    }
}
