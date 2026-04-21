@extends('admin.layouts.app')
@section('title','Members')

@section('content')

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">Members</h2>
    <a href="{{ route('admin.members.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Member
    </a>
</div>

<div class="bg-white shadow rounded p-4">
    <table class="w-full text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Phone</th>
                <th class="p-2"></th>

                <th class="p-2">Status</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($members as $m)
                <tr class="border-b">
                    <td class="p-2">{{ $m->name }}</td>
                    <td class="p-2">{{ $m->email }}</td>
                    <td class="p-2">{{ $m->phone }}</td>
                    <td class="p-2">
                        @if($m->status == 0)
                            <span class="text-yellow-600">Pending</span>
                        @elseif($m->status == 1)
                            <span class="text-green-600">Approved</span>
                        @endif
                    <td>
                    <td class="p-2">
                        @if($m->status == 0)
                            <a class="text-green-600 mr-2 btn btn-primary" href="{{ route('admin.members.approve',$m->id) }}">Approve</a>
                        @elseif($m->status == 1)
                            <a class="text-red-600 mr-2" href="{{ route('admin.members.reject',$m->id) }}">Reject</a>
                        @endif
                        <a class="text-blue-600 mr-2" href="{{ route('admin.members.edit',$m) }}">Edit</a>

                        <form method="POST" action="{{ route('admin.members.destroy',$m) }}"
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
