<?php

namespace App\Containers\ApiSection\TestContainer\Events;

use App\Containers\ApiSection\TestContainer\Models\TestContainer;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

final class TestContainerCreated extends ParentEvent
{
    public function __construct(
        public readonly TestContainer $testcontainer,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
