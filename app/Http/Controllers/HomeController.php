<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent = collect(Session::get('recent_events', []))
        ->slice(0, 5);
        $events = Event::whereIn('hash', $recent)->get();

        return view('home')->withRecentEvents($events);
    }

}
