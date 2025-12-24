<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\ApiSection\TestContainer\Actions\FindTestContainerByIdAction;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\FindTestContainerByIdRequest;
use App\Containers\ApiSection\TestContainer\UI\API\Transformers\TestContainerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class FindTestContainerByIdController extends ApiController
{
    public function __invoke(FindTestContainerByIdRequest $request, FindTestContainerByIdAction $action): JsonResponse
    {
        $testContainer = $action->run($request);

        return Response::create($testContainer, TestContainerTransformer::class)->ok();
    }
}
