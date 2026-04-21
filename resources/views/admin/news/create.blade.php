@extends('admin.layouts.app')
@section('title','Add News')

@section('content')

<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf

    <input name="title" class="w-full p-2 border rounded" placeholder="Title" required>

    <textarea name="details" class="w-full p-2 border rounded" placeholder="Details"></textarea>

    <input name="source" class="w-full p-2 border rounded" placeholder="Source">

    <input name="url" class="w-full p-2 border rounded" placeholder="URL">

    <input type="file" name="image" class="p-2 border rounded">

    <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
</form>

@endsection
