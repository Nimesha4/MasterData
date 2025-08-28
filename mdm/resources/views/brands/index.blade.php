@extends('layouts.app')

@section('content')
<h1>Brands</h1>
<a href="{{ route('brands.create') }}">Add New Brand</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($brands as $brand)
    <tr>
        <td>{{ $brand->id }}</td>
        <td>{{ $brand->code }}</td>
        <td>{{ $brand->name }}</td>
        <td>{{ $brand->status }}</td>
        <td>
            <a href="{{ route('brands.edit', $brand->id) }}">Edit</a>
            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this brand?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
