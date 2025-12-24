<?php

/**
 * @apiGroup           TestContainer
 * @apiName            List
 *
 * @api                {GET} /v1/test-containers Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\ApiSection\TestContainer\UI\API\Controllers\ListTestContainersController;
use Illuminate\Support\Facades\Route;

Route::get('test-containers', ListTestContainersController::class)
    ->middleware(['auth:api']);

