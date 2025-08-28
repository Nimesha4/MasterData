@extends('layouts.app')

@section('content')
<h1>Edit Brand</h1>

<form action="{{ route('brands.update', $brand->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Code:</label>
    <input type="text" name="code" value="{{ $brand->code }}" required><br>
    <label>Name:</label>
    <input type="text" name="name" value="{{ $brand->name }}" required><br>
    <label>Status:</label>
    <select name="status">
        <option value="Active" {{ $brand->status=='Active'?'selected':'' }}>Active</option>
        <option value="Inactive" {{ $brand->status=='Inactive'?'selected':'' }}>Inactive</option>
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection
