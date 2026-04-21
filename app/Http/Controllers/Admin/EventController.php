<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(20);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'details'     => 'nullable|string',
            'event_date'  => 'required|date',
            'type'        => 'required|in:past,future',
            'image'       => 'nullable|image|max:4096'
        ]);

        $data = $request->only(['title','details','event_date','type']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = time().'_'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('events'), $name);
            $data['image'] = $name;
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event Added Successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'details'     => 'nullable|string',
            'event_date'  => 'required|date',
            'type'        => 'required|in:past,future',
            'image'       => 'nullable|image|max:4096'
        ]);

        $data = $request->only(['title','details','event_date','type']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = time().'_'.Str::random(5).'.'.$file->getClientOriginalExtension();

            $file->move(public_path('events'), $name);
            $data['image'] = $name;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event Updated Successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return back()->with('success', 'Event Deleted Successfully!');
    }
}
