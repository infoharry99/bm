@extends('admin.layouts.app')
@section('title','Add Member')

@section('content')

<form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf

    <input name="name" class="w-full p-2 border rounded" placeholder="Name">

    <input name="email" class="w-full p-2 border rounded" placeholder="Email">

    <input name="phone" class="w-full p-2 border rounded" placeholder="Phone">

    <input name="location" class="w-full p-2 border rounded" placeholder="Location">

    <input type="file" name="image" class="w-full p-2 border rounded">

    <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
</form>

@endsection
