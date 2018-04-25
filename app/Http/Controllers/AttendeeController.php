<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'event_hash' => 'exists:events,hash',
            'name' => 'required',
            'attends' => 'boolean'
        ]);

        $event = Event::where('hash', $data['event_hash'])->first();

        $attendee = new Attendee($data);
        $attendee->event()->associate($event);
        $attendee->save();

        return redirect($event->link);
    }

}
