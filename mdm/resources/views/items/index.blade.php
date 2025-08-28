@extends('layouts.app')

@section('content')
<h1>Items</h1>
<a href="{{ route('items.create') }}">Add New Item</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Code</th>
        <th>Name</th>
        <th>Status</th>
        <th>Attachment</th>
        <th>Actions</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->brand->name ?? '' }}</td>
        <td>{{ $item->category->name ?? '' }}</td>
        <td>{{ $item->code }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->status }}</td>
        <td>
            @if($item->attachment)
                <a href="{{ asset('storage/'.$item->attachment) }}" target="_blank">View</a>
            @endif
        </td>
        <td>
            <a href="{{ route('items.edit', $item->id) }}">Edit</a>
            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this item?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
