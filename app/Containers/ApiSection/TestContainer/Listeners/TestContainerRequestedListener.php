<?php

namespace App\Containers\ApiSection\TestContainer\Listeners;

use App\Containers\ApiSection\TestContainer\Events\TestContainerRequested;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

final class TestContainerRequestedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(TestContainerRequested $event): void
    {
    }
}
