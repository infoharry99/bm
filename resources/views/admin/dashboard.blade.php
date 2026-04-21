@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="p-4 bg-white shadow rounded">
        <h3 class="font-semibold text-lg">Total Members</h3>
        <p class="text-4xl mt-2">{{ $members }}</p>
    </div>

    <div class="p-4 bg-white shadow rounded">
        <h3 class="font-semibold text-lg">Latest News</h3>
        <ul class="mt-2">
            @foreach($news as $n)
                <li class="text-sm">{{ $n->title }}</li>
            @endforeach
        </ul>
    </div>

    <div class="p-4 bg-white shadow rounded">
        <h3 class="font-semibold text-lg">Upcoming Events</h3>
        <ul class="mt-2">
            @foreach($events as $e)
                <li class="text-sm">
                    {{ $e->title }} – {{ $e->event_date ? \Carbon\Carbon::parse($e->event_date)->format('d M Y') : '' }}
                </li>
            @endforeach
        </ul>
    </div>

</div>


<div class="mt-6">
    <h3 class="font-semibold text-lg mb-2">Recent Gallery</h3>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($gallery as $g)
            <img src="{{ asset('gallery/'.$g->image) }}" class="h-40 w-full object-cover rounded shadow">
        @endforeach
    </div>
</div>

@endsection
