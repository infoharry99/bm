@extends('admin.layouts.app')
@section('title','Edit Event')

@section('content')

<form action="{{ route('admin.events.update',$event) }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf @method('PUT')

    <input name="title" value="{{ $event->title }}" class="w-full p-2 border rounded">

    <textarea name="details" class="w-full p-2 border rounded">{{ $event->details }}</textarea>

    <input type="date" name="event_date" value="{{ $event->event_date }}" class="w-full p-2 border rounded">

    <select name="type" class="w-full p-2 border rounded">
        <option value="future" {{ $event->type=='future'? 'selected':'' }}>Future</option>
        <option value="past" {{ $event->type=='past'? 'selected':'' }}>Past</option>
    </select>

    <img src="{{ asset('storage/events/'.$event->image) }}" class="h-32 rounded">

    <input type="file" name="image" class="w-full p-2 border rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>

@endsection
