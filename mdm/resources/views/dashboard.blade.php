{{-- filepath: resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    @if($user->is_admin)
        <h2>All Users' Data</h2>
        @foreach($users as $u)
            <h3>User: {{ $u->name }} ({{ $u->email }})</h3>
            <strong>Brands:</strong>
            <ul>
                @foreach($u->brands as $brand)
                    <li>{{ $brand->name }} ({{ $brand->code }})</li>
                @endforeach
            </ul>
            <strong>Categories:</strong>
            <ul>
                @foreach($u->categories as $category)
                    <li>{{ $category->name }} ({{ $category->code }})</li>
                @endforeach
            </ul>
            <strong>Items:</strong>
            <ul>
                @foreach($u->items as $item)
                    <li>{{ $item->name }} ({{ $item->code }})</li>
                @endforeach
            </ul>
            <hr>
        @endforeach
    @else
        <h2>Your Brands</h2>
        <ul>
            @foreach($brands as $brand)
                <li>{{ $brand->name }} ({{ $brand->code }})</li>
            @endforeach
        </ul>
        <h2>Your Categories</h2>
        <ul>
            @foreach($categories as $category)
                <li>{{ $category->name }} ({{ $category->code }})</li>
            @endforeach
        </ul>
        <h2>Your Items</h2>
        <ul>
            @foreach($items as $item)
                <li>{{ $item->name }} ({{ $item->code }})</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
