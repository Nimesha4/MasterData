@extends('layouts.app')

@section('content')
<h1>Edit Item</h1>

<form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Brand:</label>
    <select name="brand_id" required>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ $item->brand_id==$brand->id?'selected':'' }}>{{ $brand->name }}</option>
        @endforeach
    </select><br>

    <label>Category:</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $item->category_id==$category->id?'selected':'' }}>{{ $category->name }}</option>
        @endforeach
    </select><br>

    <label>Code:</label>
    <input type="text" name="code" value="{{ $item->code }}" required><br>
    <label>Name:</label>
    <input type="text" name="name" value="{{ $item->name }}" required><br>
    <label>Status:</label>
    <select name="status">
        <option value="Active" {{ $item->status=='Active'?'selected':'' }}>Active</option>
        <option value="Inactive" {{ $item->status=='Inactive'?'selected':'' }}>Inactive</option>
    </select><br>
    <label>Attachment:</label>
    <input type="file" name="attachment"><br>
    <button type="submit">Update</button>
</form>
@endsection
