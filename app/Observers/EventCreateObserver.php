<?php

namespace App\Observers;

use App\Http\Controllers\Service\EventCalculateDateService;
use App\Http\Requests\EventCreateRequest;
use App\Models\Event;

class EventCreateObserver
{
    public function saving(Event $event)
    {
        [$event->period, $event->period_type] = EventCalculateDateService::calculate($event->date);
    }
}
