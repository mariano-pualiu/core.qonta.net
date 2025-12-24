<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\ApiSection\TestContainer\Actions\DeleteTestContainerAction;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\DeleteTestContainerRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeleteTestContainerController extends ApiController
{
    public function __invoke(DeleteTestContainerRequest $request, DeleteTestContainerAction $action): JsonResponse
    {
        $action->run($request);

        return Response::noContent();
    }
}
