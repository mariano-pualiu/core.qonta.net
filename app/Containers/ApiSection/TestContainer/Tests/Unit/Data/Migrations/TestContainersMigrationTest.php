<?php

namespace App\Containers\ApiSection\TestContainer\Tests\Unit\Data\Migrations;

use App\Containers\ApiSection\TestContainer\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class TestContainersMigrationTest extends UnitTestCase
{
    public function testTestContainersTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'int8',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        $this->assertDatabaseTable('test_containers', $columns);
    }
}
