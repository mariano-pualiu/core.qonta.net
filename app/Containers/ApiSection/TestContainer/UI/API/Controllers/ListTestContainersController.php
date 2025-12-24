<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\ApiSection\TestContainer\Actions\ListTestContainersAction;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\ListTestContainersRequest;
use App\Containers\ApiSection\TestContainer\UI\API\Transformers\TestContainerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListTestContainersController extends ApiController
{
    public function __invoke(ListTestContainersRequest $request, ListTestContainersAction $action): JsonResponse
    {
        $testContainers = $action->run($request);

        return Response::create($testContainers, TestContainerTransformer::class)->ok();
    }
}
