<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Functional\API;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tests\Functional\ApiTestCase;
use App\Containers\ApiSection\TestContainer\UI\API\Controllers\ListTestContainersController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class ListTestContainersTest extends ApiTestCase
{
    public function testListTestContainersByAdmin(): void
    {
        $this->actingAs(User::factory()->createOne());
        TestContainer::factory()->count(2)->create();

        $response = $this->getJson(action(ListTestContainersController::class));

        $response->assertOk();
        $response->assertJson(
            static fn (AssertableJson $json) =>
                $json->has('data', 2)
                    ->etc()
        );
    }
}
