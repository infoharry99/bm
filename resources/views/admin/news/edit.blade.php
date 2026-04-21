@extends('admin.layouts.app')
@section('title','Edit News')

@section('content')

<form action="{{ route('admin.news.update',$news) }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf @method('PUT')

    <input name="title" value="{{ $news->title }}" class="w-full p-2 border rounded">

    <textarea name="details" class="w-full p-2 border rounded">{{ $news->details }}</textarea>

    <input name="source" value="{{ $news->source }}" class="w-full p-2 border rounded">

    <input name="url" value="{{ $news->url }}" class="w-full p-2 border rounded">

    <img src="{{ asset('storage/news/'.$news->image) }}" class="h-32 rounded">

    <input type="file" name="image" class="w-full p-2 border rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>

@endsection
