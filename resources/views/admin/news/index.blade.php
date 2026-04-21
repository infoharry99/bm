@extends('admin.layouts.app')
@section('title','News')

@section('content')

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">News</h2>
    <a href="{{ route('admin.news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add News
    </a>
</div>

<div class="bg-white shadow rounded p-4">

<table class="w-full">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">Title</th>
            <th class="p-2">Source</th>
            <th class="p-2">Image</th>
            <th class="p-2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($news as $n)
            <tr class="border-b">
                <td class="p-2">{{ $n->title }}</td>
                <td class="p-2">{{ $n->source ?? '-' }}</td>
                <td class="p-2">
                    @if($n->image)
                        <img src="{{ asset('storage/news/'.$n->image) }}" class="w-14 h-14 rounded">
                    @endif
                </td>

                <td class="p-2">
                    <a class="text-blue-600 mr-2" href="{{ route('admin.news.edit',$n) }}">Edit</a>

                    <form method="POST" action="{{ route('admin.news.destroy',$n) }}"
                        onsubmit="return confirm('Delete?')" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

</div>

@endsection
