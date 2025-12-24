<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Functional\API;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tests\Functional\ApiTestCase;
use App\Containers\ApiSection\TestContainer\UI\API\Controllers\FindTestContainerByIdController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class FindTestContainerByIdTest extends ApiTestCase
{
    public function testFindTestContainer(): void
    {
        $this->actingAs(User::factory()->createOne());
        $testContainer = TestContainer::factory()->createOne();

        $response = $this->getJson(action(FindTestContainerByIdController::class, ['id' => $testContainer->getHashedKey()]));

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $testContainer->getHashedKey())
                    ->etc()
        );
    }
}
