@extends('layouts.app')

@section('content')
<h1>Add Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label>Code:</label>
    <input type="text" name="code" required><br>
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Status:</label>
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br>
    <button type="submit">Save</button>
</form>
@endsection
