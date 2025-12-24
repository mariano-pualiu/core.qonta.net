<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Tasks;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Events\TestContainerDeleted;
use App\Containers\ApiSection\TestContainer\Tasks\DeleteTestContainerTask;
use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeleteTestContainerTask::class)]
final class DeleteTestContainerTaskTest extends UnitTestCase
{
    public function testDeleteTestContainer(): void
    {
        Event::fake();
        $testContainer = TestContainer::factory()->createOne();

        $result = app(DeleteTestContainerTask::class)->run($testContainer->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(TestContainerDeleted::class);
    }
}
