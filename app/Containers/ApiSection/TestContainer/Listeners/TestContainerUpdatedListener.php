<?php

namespace App\Containers\ApiSection\TestContainer\Listeners;

use App\Containers\ApiSection\TestContainer\Events\TestContainerUpdated;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

final class TestContainerUpdatedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(TestContainerUpdated $event): void
    {
    }
}
