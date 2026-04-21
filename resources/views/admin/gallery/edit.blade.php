    @extends('admin.layouts.app')
@section('title','Edit Gallery Image')

@section('content')

<form action="{{ route('admin.gallery.update',$gallery) }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf @method('PUT')

    <input name="year" value="{{ $gallery->year }}" class="w-full p-2 border rounded">

    <input name="caption" value="{{ $gallery->caption }}" class="w-full p-2 border rounded">

    <img src="{{ asset('storage/gallery/'.$gallery->image) }}" class="h-32 rounded">

    <input type="file" name="image" class="w-full p-2 border rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>

@endsection
