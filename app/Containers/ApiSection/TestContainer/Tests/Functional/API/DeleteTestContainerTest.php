<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Functional\API;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tests\Functional\ApiTestCase;
use App\Containers\ApiSection\TestContainer\UI\API\Controllers\DeleteTestContainerController;
use App\Containers\AppSection\User\Models\User;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class DeleteTestContainerTest extends ApiTestCase
{
    public function testDeleteExistingTestContainer(): void
    {
        $this->actingAs(User::factory()->createOne());
        $testContainer = TestContainer::factory()->createOne();

        $response = $this->deleteJson(action(DeleteTestContainerController::class, ['id' => $testContainer->getHashedKey()]));

        $response->assertNoContent();
    }
}
