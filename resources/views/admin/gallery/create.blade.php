@extends('admin.layouts.app')
@section('title','Add Gallery Image')

@section('content')

<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf

    <input name="year" class="w-full p-2 border rounded" placeholder="Year">

    <input name="caption" class="w-full p-2 border rounded" placeholder="Caption">

    <input type="file" name="image" class="w-full p-2 border rounded" required>

    <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
</form>

@endsection
