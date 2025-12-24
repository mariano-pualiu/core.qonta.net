<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Factories;

use App\Containers\ApiSection\TestContainer\Data\Factories\TestContainerFactory;
use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TestContainerFactory::class)]
final class TestContainerFactoryTest extends UnitTestCase
{
    public function testCreateTestContainer(): void
    {
        $testContainer = TestContainer::factory()->make();

        $this->assertInstanceOf(TestContainer::class, $testContainer);
    }
}
