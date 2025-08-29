{{-- filepath: resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    

    .dashboard-container {
        background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 10%, #f8fafc 90%);
        min-height: 100vh;
        padding: 2rem 0;
    }
    
    .dashboard-header {
        text-align: center;
        margin-bottom: 3rem;
        color: #2d3748;
    }
    
    .dashboard-header h1 {
        font-size: 2.5rem;
        font-weight: 300;
        margin-bottom: 0.5rem;
        color: #1a202c;
    }
    
    .section-title {
        color: #2d3748;
        font-size: 1.75rem;
        font-weight: 700;
        margin: 2rem 0 2rem 0;
        text-align: center;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
        border-radius: 2px;
    }
    
    .users-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 2rem;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    
    .user-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(74, 85, 104, 0.08);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .user-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(74, 85, 104, 0.15);
    }
    
    .user-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
    }
    
    .user-header {
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 140, 0, 0.1) 100%);
        padding: 1.5rem;
        text-align: center;
        position: relative;
    }
    
    .user-avatar {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: linear-gradient(135deg, #FF8C00, rgba(255, 140, 0, 0.8));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 auto 1rem;
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
    }
    
    .user-name {
        color: #1a202c;
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
    }
    
    .user-email {
        color: #718096;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }
    
    .user-stats {
        display: flex;
        justify-content: space-around;
        gap: 1rem;
    }
    
    .stat-box {
        text-align: center;
        padding: 0.75rem 0.5rem;
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.08) 0%, rgba(255, 140, 0, 0.03) 100%);
        border-radius: 8px;
        border: 1px solid rgba(255, 140, 0, 0.2);
        flex: 1;
    }
    
    .stat-number {
        display: block;
        font-size: 1.5rem;
        font-weight: 700;
        color: #FF8C00;
        line-height: 1;
    }
    
    .stat-label {
        font-size: 0.7rem;
        color: #718096;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-top: 0.25rem;
    }
    
    .user-content {
        padding: 0;
    }
    
    .content-tabs {
        display: flex;
        background: rgba(255, 140, 0, 0.05);
        border-bottom: 1px solid rgba(255, 140, 0, 0.2);
    }
    
    .tab-btn {
        flex: 1;
        padding: 1rem 0.5rem;
        background: none;
        border: none;
        font-size: 0.8rem;
        font-weight: 600;
        color: rgba(255, 140, 0, 0.7);
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
        text-align: center;
    }
    
    .tab-btn.active {
        color: #FF8C00;
        background: rgba(255, 140, 0, 0.1);
    }
    
    .tab-btn.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: #FF8C00;
    }
    
    .tab-content {
        display: none;
        max-height: 300px;
        overflow-y: auto;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .data-table thead {
        background: white;
        position: sticky;
        top: 0;
        z-index: 10;
    }
    
    .data-table th {
        padding: 0.75rem 1rem;
        text-align: left;
        font-weight: 600;
        color: #FF8C00;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid rgba(255, 140, 0, 0.2);
    }
    
    .data-table td {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }
    
    .data-table tbody tr:hover {
        background: rgba(255, 140, 0, 0.05);
    }
    
    .data-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .item-name {
        font-weight: 500;
        color: #2d3748;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }
    
    .item-code {
        color: rgba(255, 140, 0, 0.8);
        font-size: 0.7rem;
        font-family: 'Monaco', 'Menlo', monospace;
        background: rgba(255, 140, 0, 0.1);
        padding: 0.15rem 0.4rem;
        border-radius: 3px;
        display: inline-block;
        border: 1px solid rgba(255, 140, 0, 0.2);
    }
    
    .action-buttons {
        display: flex;
        gap: 0.25rem;
        align-items: center;
    }
    
    .btn-action {
        border: 1px solid rgba(255, 140, 0, 0.3);
        border-radius: 4px;
        padding: 0.25rem 0.5rem;
        font-size: 0.7rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.2s ease;
        cursor: pointer;
        background: rgba(255, 140, 0, 0.05);
        color: #FF8C00;
    }
    
    .btn-action:hover {
        background: #FF8C00;
        color: white;
        border-color: #FF8C00;
        text-decoration: none;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.3);
    }
    
    .btn-delete {
        color: #e53e3e;
        border-color: #fed7d7;
    }
    
    .btn-delete:hover {
        background: #e53e3e;
        color: white;
        border-color: #e53e3e;
    }
    
    .empty-state {
        text-align: center;
        padding: 2rem 1rem;
        color: #718096;
    }
    
    .empty-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        opacity: 0.6;
    }
    
    .empty-text {
        font-size: 0.9rem;
        font-style: italic;
    }
    
    /* Personal Dashboard Styles */
    .personal-dashboard {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    
    .personal-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .personal-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(74, 85, 104, 0.08);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        position: relative;
    }
    
    .personal-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
    }
    
    .personal-header {
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 140, 0, 0.1) 100%);
        padding: 1.5rem;
        text-align: center;
    }
    
    .personal-title {
        color: #FF8C00;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }
    
    .personal-count {
        color: rgba(255, 140, 0, 0.7);
        font-size: 0.9rem;
        margin-top: 0.25rem;
    }
    
    /* Custom scrollbar */
    .tab-content::-webkit-scrollbar {
        width: 6px;
    }
    
    .tab-content::-webkit-scrollbar-track {
        background: rgba(255, 140, 0, 0.05);
    }
    
    .tab-content::-webkit-scrollbar-thumb {
        background: rgba(255, 140, 0, 0.3);
        border-radius: 3px;
    }
    
    .tab-content::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 140, 0, 0.5);
    }
    
    @media (max-width: 768px) {
        .users-grid {
            grid-template-columns: 1fr;
            padding: 0 1rem;
        }
        
        .personal-grid {
            grid-template-columns: 1fr;
        }
        
        .user-stats {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .stat-box {
            padding: 0.5rem;
        }
        
        .data-table th,
        .data-table td {
            padding: 0.5rem;
            font-size: 0.8rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .btn-action {
            font-size: 0.65rem;
            padding: 0.2rem 0.4rem;
        }
    }
    
    @media (min-width: 1200px) {
        .users-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>

<div class="dashboard-container">
    <div class="container-fluid">
        
        @if($user->is_admin)
            <h2 class="section-title">👥 All Users Management Dashboard</h2>
            
            <div class="users-grid">
                @foreach($users as $u)
                @if(!$u->is_admin)
                    <div class="user-card">
                        <div class="user-header">
                            <div class="user-avatar">
                                {{ strtoupper(substr($u->name, 0, 1)) }}
                            </div>
                            <h3 class="user-name">{{ $u->name }}</h3>
                            <div class="user-email">{{ $u->email }}</div>
                            
                            <div class="user-stats">
                                <div class="stat-box">
                                    <span class="stat-number">{{ count($u->brands) }}</span>
                                    <span class="stat-label">Brands</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">{{ count($u->categories) }}</span>
                                    <span class="stat-label">Categories</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">{{ count($u->items) }}</span>
                                    <span class="stat-label">Items</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="user-content">
                            <div class="content-tabs">
                                <button class="tab-btn active" onclick="showUserTab(event, 'brands-{{ $u->id }}')">
                                    Brands
                                </button>
                                <button class="tab-btn" onclick="showUserTab(event, 'categories-{{ $u->id }}')">
                                    Categories
                                </button>
                                <button class="tab-btn" onclick="showUserTab(event, 'items-{{ $u->id }}')">
                                    Items
                                </button>
                            </div>
                            
                            <div id="brands-{{ $u->id }}" class="tab-content active">
                                @if(count($u->brands) > 0)
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($u->brands as $brand)
                                                <tr>
                                                    <td>
                                                        <div class="item-name">{{ $brand->name }}</div>
                                                    </td>
                                                    <td>
                                                        <span class="item-code">{{ $brand->code }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <a href="{{ route('brands.edit', $brand) }}" class="btn-action">
                                                                ✏️ Edit
                                                            </a>
                                                            <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this brand?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn-action btn-delete">🗑️</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">📦</div>
                                        <div class="empty-text">No brands available</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div id="categories-{{ $u->id }}" class="tab-content">
                                @if(count($u->categories) > 0)
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($u->categories as $category)
                                                <tr>
                                                    <td>
                                                        <div class="item-name">{{ $category->name }}</div>
                                                    </td>
                                                    <td>
                                                        <span class="item-code">{{ $category->code }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <a href="{{ route('categories.edit', $category) }}" class="btn-action">
                                                                ✏️ Edit
                                                            </a>
                                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this category?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn-action btn-delete">🗑️</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">📁</div>
                                        <div class="empty-text">No categories available</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div id="items-{{ $u->id }}" class="tab-content">
                                @if(count($u->items) > 0)
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($u->items as $item)
                                                <tr>
                                                    <td>
                                                        <div class="item-name">{{ $item->name }}</div>
                                                    </td>
                                                    <td>
                                                        <span class="item-code">{{ $item->code }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <a href="{{ route('items.edit', $item) }}" class="btn-action">
                                                                ✏️ Edit
                                                            </a>
                                                            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this item?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn-action btn-delete">🗑️</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">📋</div>
                                        <div class="empty-text">No items available</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
            
        @else
            <div class="personal-dashboard">
                <h2 class="section-title">📊 Your Personal Dashboard</h2>
                
                <div class="personal-grid">
                    <div class="personal-card">
                        <div class="personal-header">
                            <h3 class="personal-title">Your Brands</h3>
                            <div class="personal-count">{{ count($brands) }} total brands</div>
                        </div>
                        <div class="tab-content active">
                            @if(count($brands) > 0)
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>
                                                    <div class="item-name">{{ $brand->name }}</div>
                                                </td>
                                                <td>
                                                    <span class="item-code">{{ $brand->code }}</span>
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('brands.edit', $brand) }}" class="btn-action">
                                                            ✏️ Edit
                                                        </a>
                                                        <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this brand?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn-action btn-delete">🗑️</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="empty-state">
                                    <div class="empty-icon">📦</div>
                                    <div class="empty-text">No brands available</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="personal-card">
                        <div class="personal-header">
                            <h3 class="personal-title">Your Categories</h3>
                            <div class="personal-count">{{ count($categories) }} total categories</div>
                        </div>
                        <div class="tab-content active">
                            @if(count($categories) > 0)
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>
                                                    <div class="item-name">{{ $category->name }}</div>
                                                </td>
                                                <td>
                                                    <span class="item-code">{{ $category->code }}</span>
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('categories.edit', $category) }}" class="btn-action">
                                                            ✏️ Edit
                                                        </a>
                                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this category?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn-action btn-delete">🗑️</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="empty-state">
                                    <div class="empty-icon">📁</div>
                                    <div class="empty-text">No categories available</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="personal-card">
                        <div class="personal-header">
                            <h3 class="personal-title">Your Items</h3>
                            <div class="personal-count">{{ count($items) }} total items</div>
                        </div>
                        <div class="tab-content active">
                            @if(count($items) > 0)
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-name">{{ $item->name }}</div>
                                                </td>
                                                <td>
                                                    <span class="item-code">{{ $item->code }}</span>
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('items.edit', $item) }}" class="btn-action">
                                                            ✏️ Edit
                                                        </a>
                                                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this item?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn-action btn-delete">🗑️</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="empty-state">
                                    <div class="empty-icon">📋</div>
                                    <div class="empty-text">No items available</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function showUserTab(evt, tabName) {
    // Get the user card container
    const userCard = evt.target.closest('.user-card');
    
    // Hide all tab contents in this user card
    const tabContents = userCard.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.remove('active');
    });
    
    // Remove active class from all tab buttons in this user card
    const tabButtons = userCard.querySelectorAll('.tab-btn');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Show the selected tab content
    document.getElementById(tabName).classList.add('active');
    
    // Add active class to clicked button
    evt.target.classList.add('active');
}
</script>

@endsection