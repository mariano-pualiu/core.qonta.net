<?php

namespace App\Containers\ApiSection\TestContainer\Listeners;

use App\Containers\ApiSection\TestContainer\Events\TestContainersListed;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

final class TestContainersListedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(TestContainersListed $event): void
    {
    }
}
