<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Functional\API;

use App\Containers\ApiSection\TestContainer\Tests\Functional\ApiTestCase;
use App\Containers\ApiSection\TestContainer\UI\API\Controllers\CreateTestContainerController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class CreateTestContainerTest extends ApiTestCase
{
    public function testCreateTestContainer(): void
    {
        $this->actingAs(User::factory()->createOne());
        $data = [
            // TODO: test
            // 'something' => 'value',
        ];

        $response = $this->postJson(action(CreateTestContainerController::class), $data);

        $response->assertCreated();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.type', 'TestContainer')
                    // ->where('data.something', $data['something'])
                    ->etc()
        );
    }
}
