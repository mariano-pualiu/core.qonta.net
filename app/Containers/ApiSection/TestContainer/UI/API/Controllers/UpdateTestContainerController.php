<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\ApiSection\TestContainer\Actions\UpdateTestContainerAction;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\UpdateTestContainerRequest;
use App\Containers\ApiSection\TestContainer\UI\API\Transformers\TestContainerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateTestContainerController extends ApiController
{
    public function __invoke(UpdateTestContainerRequest $request, UpdateTestContainerAction $action): JsonResponse
    {
        $testContainer = $action->run($request);

        return Response::create($testContainer, TestContainerTransformer::class)->ok();
    }
}
