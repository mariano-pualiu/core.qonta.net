<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Tasks;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Events\TestContainerUpdated;
use App\Containers\ApiSection\TestContainer\Tasks\UpdateTestContainerTask;
use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdateTestContainerTask::class)]
final class UpdateTestContainerTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateTestContainer(): void
    {
        Event::fake();
        $testContainer = TestContainer::factory()->createOne();
        $data = [
            // 'some_field' => 'new_field_data',
        ];

        $updatedTestContainer = app(UpdateTestContainerTask::class)->run($data, $testContainer->id);

        $this->assertEquals($testContainer->id, $updatedTestContainer->id);
        // $this->assertEquals($data['some_field'], $updatedTestContainer->some_field);
        Event::assertDispatched(TestContainerUpdated::class);
    }
}
