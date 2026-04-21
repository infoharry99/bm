@extends('admin.layouts.app')

@section('title','Events')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Manage Events</h2>
    <a href="{{ route('admin.events.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
       + Add Event
    </a>
</div>

<div class="bg-white shadow rounded p-4 overflow-x-auto">
    <table class="w-full text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">Title</th>
                <th class="p-3">Date</th>
                <th class="p-3">Type</th>
                <th class="p-3">Image</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($events as $e)
                <tr class="border-b">
                    <td class="p-3">{{ $e->title }}</td>
                    <td class="p-3">
                        {{ $e->event_date ? \Carbon\Carbon::parse($e->event_date)->format('d M Y') : '' }}
                    </td>
                    <td class="p-3 capitalize">{{ $e->type }}</td>
                    <td class="p-3">
                        @if($e->image)
                            <img src="{{ asset('events/'.$e->image) }}"
                                 class="w-14 h-14 object-cover rounded border">
                        @else
                            <span class="text-gray-500">No Image</span>
                        @endif
                    </td>
                    <td class="p-3 flex gap-3">
                        <a href="{{ route('admin.events.edit', $e) }}"
                            class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('admin.events.destroy', $e) }}" method="POST" onsubmit="return confirm('Delete this event?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>

<div class="mt-4">
    {{ $events->links() }}
</div>

@endsection
