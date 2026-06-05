@extends('admin.layouts.app')
@section('title','Members')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">Members</h2>
    <a href="{{ route('admin.members.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Member
    </a>
</div>

<div class="bg-white shadow rounded p-4 overflow-x-auto">

<table id="membersTable" class="table table-bordered table-hover align-middle">
    <thead class="bg-gray-100 uppercase text-xs">
        <tr>
            <th class="p-3">Image</th>
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Phone</th>
            <th class="p-3">Bihar Location</th>
            <th class="p-3">UK Location</th>
            <th class="p-3">Postcode</th>
            <th class="p-3">Status</th>
            <th class="p-3 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($members as $m)
        <tr class="border-b hover:bg-gray-50">

            <!-- IMAGE -->
            <td class="p-3">
                @if($m->image)
                    <img src="{{ asset('uploads/'.$m->image) }}"
                         class="w-10 h-10 rounded-full object-cover">
                @else
                    <div class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        {{ strtoupper(substr($m->name,0,1)) }}
                    </div>
                @endif
            </td>

            <td class="p-3 font-medium">{{ $m->name }}</td>
            <td class="p-3">{{ $m->email }}</td>
            <td class="p-3">{{ $m->phone }}</td>
            <td class="p-3">{{ $m->location }}</td>
            <td class="p-3">{{ $m->uk_location }}</td>
            <td class="p-3">{{ $m->Postcode }}</td>

            <!-- STATUS -->
            <td class="p-3">
                @if($m->status == 0)
                    <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                        Pending
                    </span>
                @elseif($m->status == 1)
                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                        Approved
                    </span>
                @endif
            </td>

            <!-- ACTION -->
            <td class="p-3 text-center space-x-2">

                @if($m->status == 0)
                    <a href="{{ route('admin.members.approve',$m->id) }}"
                       class="bg-green-500 text-white px-3 py-1 rounded text-xs">
                        Approve
                    </a>
                @else
                    <a href="{{ route('admin.members.reject',$m->id) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                        Reject
                    </a>
                @endif

                <a href="{{ route('admin.members.edit',$m) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded text-xs">
                    Edit
                </a>

                <form method="POST"
                      action="{{ route('admin.members.destroy',$m) }}"
                      class="inline"
                      onsubmit="return confirm('Delete this member?')">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                        Delete
                    </button>
                </form>

            </td>

        </tr>
        @endforeach
    </tbody>
</table>

</div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {

    $('#membersTable').DataTable({
        responsive: true,
        pageLength: 25,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        order: [[1, 'asc']],
        language: {
            search: "Search Member:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ members",
            paginate: {
                first: "First",
                last: "Last",
                next: "→",
                previous: "←"
            }
        }
    });

});
</script>
@endsection
