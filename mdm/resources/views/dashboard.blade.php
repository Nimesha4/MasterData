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
                    <li>
                        {{ $brand->name }} ({{ $brand->code }})
                        <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this brand?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            
            <strong>Categories:</strong>
            <ul>
                @foreach($u->categories as $category)
                    <li>
                        {{ $category->name }} ({{ $category->code }})
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            
            <strong>Items:</strong>
            <ul>
                @foreach($u->items as $item)
                    <li>
                        {{ $item->name }} ({{ $item->code }})
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <hr>
        @endforeach
    @else
        <h2>Your Brands</h2>
        <ul>
            @foreach($brands as $brand)
                <li>
                    {{ $brand->name }} ({{ $brand->code }})
                    <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this brand?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <h2>Your Categories</h2>
        <ul>
            @foreach($categories as $category)
                <li>
                    {{ $category->name }} ({{ $category->code }})
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <h2>Your Items</h2>
        <ul>
            @foreach($items as $item)
                <li>
                    {{ $item->name }} ({{ $item->code }})
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
