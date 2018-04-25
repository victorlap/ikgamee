<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 25/04/2018
 * Time: 14:43
 */

namespace App\Observers;


use App\Event;
use App\Mail\EventCreated;
use Illuminate\Support\Facades\Mail;

class EventObserver
{

    /**
     * Listen to the Event creating event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function creating(Event $event)
    {
        $event->hash = md5($event->name . $event->date . time());
    }

    /**
     * Listen to the Event created event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        if(!$event->email) {
            return;
        }

        Mail::to($event->email)->send(new EventCreated($event));
    }

}