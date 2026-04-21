@extends('admin.layouts.app')
@section('title','Contact Messages')

@section('content')

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">Contact Messages</h2>
</div>

<div class="bg-white shadow rounded p-4">

<table class="w-full text-left">

<thead class="bg-gray-100">
<tr>
<th class="p-2">Name</th>
<th class="p-2">Email</th>
<th class="p-2">Phone</th>
<th class="p-2">Message</th>
<th class="p-2">Date</th>
</tr>
</thead>

<tbody>

@foreach($contacts as $c)

<tr class="border-b">

<td class="p-2">{{ $c->name }}</td>

<td class="p-2">{{ $c->email }}</td>

<td class="p-2">{{ $c->phone }}</td>

<td class="p-2">{{ $c->message }}</td>

<td class="p-2">{{ date('d M Y',strtotime($c->created_at)) }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection