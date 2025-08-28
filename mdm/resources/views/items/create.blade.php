@extends('layouts.app')

@section('content')
<h1>Add Item</h1>

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Brand:</label>
    <select name="brand_id" required>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select><br>

    <label>Category:</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>

    <label>Code:</label>
    <input type="text" name="code" required><br>
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Status:</label>
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br>
    <label>Attachment:</label>
    <input type="file" name="attachment"><br>
    <button type="submit">Save</button>
</form>
@endsection
