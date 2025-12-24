<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Tasks;

use App\Containers\ApiSection\TestContainer\Events\TestContainerCreated;
use App\Containers\ApiSection\TestContainer\Tasks\CreateTestContainerTask;
use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateTestContainerTask::class)]
final class CreateTestContainerTaskTest extends UnitTestCase
{
    public function testCreateTestContainer(): void
    {
        Event::fake();
        $data = [];

        $testContainer = app(CreateTestContainerTask::class)->run($data);

        $this->assertModelExists($testContainer);
        Event::assertDispatched(TestContainerCreated::class);
    }
}
