<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Tasks;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Events\TestContainerRequested;
use App\Containers\ApiSection\TestContainer\Tasks\FindTestContainerByIdTask;
use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindTestContainerByIdTask::class)]
final class FindTestContainerByIdTaskTest extends UnitTestCase
{
    public function testFindTestContainerById(): void
    {
        Event::fake();
        $testContainer = TestContainer::factory()->createOne();

        $foundTestContainer = app(FindTestContainerByIdTask::class)->run($testContainer->id);

        $this->assertEquals($testContainer->id, $foundTestContainer->id);
        Event::assertDispatched(TestContainerRequested::class);
    }
}
