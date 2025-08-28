@extends('layouts.app')

@section('content')
<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Code:</label>
    <input type="text" name="code" value="{{ $category->code }}" required><br>
    <label>Name:</label>
    <input type="text" name="name" value="{{ $category->name }}" required><br>
    <label>Status:</label>
    <select name="status">
        <option value="Active" {{ $category->status=='Active'?'selected':'' }}>Active</option>
        <option value="Inactive" {{ $category->status=='Inactive'?'selected':'' }}>Inactive</option>
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection
