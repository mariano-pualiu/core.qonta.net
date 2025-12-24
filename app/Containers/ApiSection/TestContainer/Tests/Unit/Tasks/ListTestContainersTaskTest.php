<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Tasks;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Events\TestContainersListed;
use App\Containers\ApiSection\TestContainer\Tasks\ListTestContainersTask;
use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListTestContainersTask::class)]
final class ListTestContainersTaskTest extends UnitTestCase
{
    public function testListTestContainers(): void
    {
        Event::fake();
        TestContainer::factory()->count(3)->create();

        $foundTestContainers = app(ListTestContainersTask::class)->run();

        $this->assertCount(3, $foundTestContainers);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundTestContainers);
        Event::assertDispatched(TestContainersListed::class);
    }
}
