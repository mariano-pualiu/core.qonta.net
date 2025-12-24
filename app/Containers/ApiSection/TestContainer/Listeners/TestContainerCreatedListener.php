<?php

namespace App\Containers\ApiSection\TestContainer\Listeners;

use App\Containers\ApiSection\TestContainer\Events\TestContainerCreated;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

final class TestContainerCreatedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(TestContainerCreated $event): void
    {
    }
}
