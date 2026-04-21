<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
    $past = Event::where('type','past')->get();
    $future = Event::where('type','future')->get();
    return view('events.index', compact('past','future'));
}

}
