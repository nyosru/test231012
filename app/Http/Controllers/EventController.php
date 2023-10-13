<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function store(EventCreateRequest $request)
    {
        $validated = $request->validated();
//        dd($validated);

        $new = new Event($validated);
        $new->save();
        dd($new);
    }
}
