@extends('admin.layouts.app')
@section('title','Edit Member')

@section('content')

<form action="{{ route('admin.members.update',$member) }}" method="POST" enctype="multipart/form-data"
      class="bg-white shadow rounded p-6 space-y-4">
    @csrf @method('PUT')

    <input name="name" value="{{ $member->name }}" class="w-full p-2 border rounded">

    <input name="email" value="{{ $member->email }}" class="w-full p-2 border rounded">

    <input name="phone" value="{{ $member->phone }}" class="w-full p-2 border rounded">

    <input name="location" value="{{ $member->location }}" class="w-full p-2 border rounded">

    <img src="{{ asset('storage/members/'.$member->image) }}" class="h-32 rounded">

    <input type="file" name="image" class="w-full p-2 border rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>

@endsection
