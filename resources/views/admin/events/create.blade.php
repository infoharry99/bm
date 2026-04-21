@extends('admin.layouts.app')
@section('title','Add Event')

@section('content')

<form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf

    <input name="title" class="w-full p-2 border rounded" placeholder="Event Title" required>

    <textarea name="details" class="w-full p-2 border rounded" placeholder="Event Details"></textarea>

    <input type="date" name="event_date" class="w-full p-2 border rounded" required>

    <select name="type" class="w-full p-2 border rounded">
        <option value="future">Future</option>
        <option value="past">Past</option>
    </select>

    <input type="file" name="image" class="w-full p-2 border rounded">

    <button class="bg-green-600 text-white px-4 py-2 rounded">Save Event</button>
</form>

@endsection
