@extends('layouts.app')

@section('content')
<h1>Categories</h1>
<a href="{{ route('categories.create') }}">Add New Category</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->code }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->status }}</td>
        <td>
            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this category?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
