<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\ApiSection\TestContainer\Actions\CreateTestContainerAction;
use App\Containers\ApiSection\TestContainer\UI\API\Requests\CreateTestContainerRequest;
use App\Containers\ApiSection\TestContainer\UI\API\Transformers\TestContainerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateTestContainerController extends ApiController
{
    public function __invoke(CreateTestContainerRequest $request, CreateTestContainerAction $action): JsonResponse
    {
        $testContainer = $action->run($request);

        return Response::create($testContainer, TestContainerTransformer::class)->created();
    }
}
