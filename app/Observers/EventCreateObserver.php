<?php

namespace App\Observers;

use App\Http\Controllers\Service\EventCalculateDateService;
use App\Http\Requests\EventCreateRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class EventCreateObserver
{
    public function saving(Event $event)
    {
        [$event->period, $event->period_type] = EventCalculateDateService::calculate($event->date);
        // ложим в кеш на 5 минут
//        Cache::tags(['event'])->put('events', $event, 300);
        $data = (array) $event->toArray();
        Cache::put('event2' , $data, 300);
    }
}
