<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Functional\API;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tests\Functional\ApiTestCase;
use App\Containers\ApiSection\TestContainer\UI\API\Controllers\UpdateTestContainerController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class UpdateTestContainerTest extends ApiTestCase
{
    // TODO: test
    public function testUpdateExistingTestContainer(): void
    {
        $this->actingAs(User::factory()->createOne());
        $testContainer = TestContainer::factory()->createOne([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->patchJson(action(UpdateTestContainerController::class, ['id' => $testContainer->getHashedKey()]), $data);

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.type', 'TestContainer')
                    ->where('data.id', $testContainer->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }
}
