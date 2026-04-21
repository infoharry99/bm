@extends('admin.layouts.app')
@section('title','Gallery')

@section('content')

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">Gallery</h2>
    <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Image
    </a>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach($gallery as $g)
        <div class="bg-white shadow rounded p-2">
            <img src="{{ asset('gallery/'.$g->image) }}" class="h-40 w-full object-cover rounded">
            <p class="text-center mt-2">{{ $g->year }}</p>

            <div class="flex justify-center gap-3 mt-2">
                <a class="text-blue-600" href="{{ route('admin.gallery.edit',$g) }}">Edit</a>

                <form method="POST" action="{{ route('admin.gallery.destroy',$g) }}"
                    onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection
