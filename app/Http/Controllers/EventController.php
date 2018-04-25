<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
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
            'name' => 'required|max:255',
            'date' => 'date'
        ]);

        $data['hash'] = md5($data['name'] . $data['date'] . time());

        $event = new Event($data);
        $event->save();

        return redirect($event->link);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $this->addToRecent($event);

        $shareText = 'Ben jij erbij? Geef nu je beschikbaarheid door: '. urlencode($event->link);
        return view('event.show')->withEvent($event)->withShareText($shareText);
    }

    public function addToRecent(Event $event) {
        $recent = Session::get('recent_events', []);
        Session::put('recent_events', array_unique(array_merge([$event->hash], $recent)));
    }

}
