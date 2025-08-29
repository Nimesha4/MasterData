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
        color: black;
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

    .image-row {
    display: flex;
    justify-content: center;
    gap: 20px; /* space between images */
    margin: 20px 0;
}

.image-row img {
    width: 400px;
    height: 300px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.summary-row {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin: 2.5rem 0;
}

.summary-card {
    width: 220px;
    height: 150px;
    border-radius: 16px;
    background: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border: 1px solid rgba(255, 140, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.summary-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(255, 140, 0, 0.2);
}

.summary-number {
    font-size: 2rem;
    font-weight: 700;
    color: #FF8C00;
    margin-bottom: 0.5rem;
}

.summary-label {
    font-size: 1rem;
    color: #2d3748;
    font-weight: 600;
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
        color: black;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
        text-align: center;
    }
    
    .tab-btn.active {
        color: black;
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
        color: black;
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
        color: black;
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
<style>
        /* Hide number input spinners for all browsers */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
</style>

<div class="dashboard-container">
    <div class="container-fluid">
        <!-- Large Centered Search Bar for Dashboard (Admin & User) -->
        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 2.5rem; margin-top: 1.5rem;">
            <form action="{{ route('dashboard') }}" method="GET" style="width: 100%; max-width: 600px;">
                <div style="display: flex; align-items: center; background: #fff; border-radius: 2.5rem; box-shadow: 0 2px 12px rgba(255,140,0,0.08); border: 1.5px solid #FF8C00; padding: 0.25rem 1.2rem;">
                    <input type="text" name="dashboard_search" value="{{ request('dashboard_search') }}" placeholder="Search items, categories, brands..." style="flex: 1; border: none !important; outline: none !important; box-shadow: none !important; font-size: 1.1rem; padding: 0.45rem 0.8rem; background: transparent; color: #2d3748; font-weight: 500;" autofocus autocomplete="off">
</style>
<style>
    /* Remove border on focus for dashboard search bar */
    input[name="dashboard_search"]:focus {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }
</style>
                    <button type="submit" style="background: #FF8C00; color: #fff; border: none; border-radius: 2rem; padding: 0.5rem 1.5rem; font-size: 1rem; font-weight: 600; margin-left: 1rem; box-shadow: 0 2px 8px rgba(255,140,0,0.12); transition: background 0.2s; cursor: pointer;">Search</button>
                </div>
            </form>
        </div>
        @if($user->is_admin)
            <h2 class="section-title">Dashboard Overview – Track, Analyze & Manage Data at a Glance</h2>
            
            @php
                $userCardsPerPage = 3;
                $userPage = request()->query('user_page', 1);
                $nonAdminUsers = $users->filter(function($u) { return !$u->is_admin; })->values();
                $userTotal = $nonAdminUsers->count();
                $userTotalPages = (int) ceil($userTotal / $userCardsPerPage);
                $userSlice = $nonAdminUsers->slice(($userPage-1)*$userCardsPerPage, $userCardsPerPage);
            @endphp
            <div class="users-grid">
                @foreach($userSlice as $u)
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
                                @php
                                    $brandsPerPage = 3;
                                    $brandsPage = request()->query('brands_page_'.$u->id, 1);
                                    $brandsTotal = count($u->brands);
                                    $brandsTotalPages = (int) ceil($brandsTotal / $brandsPerPage);
                                    $brandsSlice = collect($u->brands)->slice(($brandsPage-1)*$brandsPerPage, $brandsPerPage);
                                @endphp
                                @if($brandsTotal > 0)
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($brandsSlice as $brand)
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
                                    @if($brandsTotalPages > 1)
                                    <div style="display:flex;justify-content:center;margin:1rem 0;gap:0.5rem;">
                                        <nav aria-label="Brands pagination">
                                            <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                                                <li>
                                                    <a href="?brands_page_{{ $u->id }}=1" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                                                </li>
                                                <li>
                                                    <a href="?brands_page_{{ $u->id }}={{ max(1,$brandsPage-1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                                                </li>
                                                @for($i=1;$i<=$brandsTotalPages;$i++)
                                                <li>
                                                    <a href="?brands_page_{{ $u->id }}={{ $i }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                                                </li>
                                                @endfor
                                                <li>
                                                    <a href="?brands_page_{{ $u->id }}={{ min($brandsTotalPages,$brandsPage+1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==$brandsTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                                                </li>
                                                <li>
                                                    <a href="?brands_page_{{ $u->id }}={{ $brandsTotalPages }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==$brandsTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    @endif
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">📦</div>
                                        <div class="empty-text">No brands available</div>
                                    </div>
                                @endif
                            </div>
                            <div id="categories-{{ $u->id }}" class="tab-content">
                                @php
                                    $categoriesPerPage = 3;
                                    $categoriesPage = request()->query('categories_page_' . $u->id, 1);
                                    $categoriesTotal = count($u->categories);
                                    $categoriesTotalPages = (int) ceil($categoriesTotal / $categoriesPerPage);
                                    $categoriesSlice = collect($u->categories)->slice(($categoriesPage-1)*$categoriesPerPage, $categoriesPerPage);
                                @endphp
                                @if($categoriesTotal > 0)
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categoriesSlice as $category)
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
                                    @if($categoriesTotalPages > 1)
                                    <div style="display:flex;justify-content:center;margin:1rem 0;gap:0.5rem;">
                                        <nav aria-label="Categories pagination">
                                            <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                                                <li>
                                                    <a href="?categories_page_{{ $u->id }}=1" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                                                </li>
                                                <li>
                                                    <a href="?categories_page_{{ $u->id }}={{ max(1,$categoriesPage-1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                                                </li>
                                                @for($i=1;$i<=$categoriesTotalPages;$i++)
                                                <li>
                                                    <a href="?categories_page_{{ $u->id }}={{ $i }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                                                </li>
                                                @endfor
                                                <li>
                                                    <a href="?categories_page_{{ $u->id }}={{ min($categoriesTotalPages,$categoriesPage+1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==$categoriesTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                                                </li>
                                                <li>
                                                    <a href="?categories_page_{{ $u->id }}={{ $categoriesTotalPages }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==$categoriesTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    @endif
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">📁</div>
                                        <div class="empty-text">No categories available</div>
                                    </div>
                                @endif
                            </div>
                            <div id="items-{{ $u->id }}" class="tab-content">
                                @php
                                    $itemsPerPage = 3;
                                    $itemsPage = request()->query('items_page_' . $u->id, 1);
                                    $itemsTotal = count($u->items);
                                    $itemsTotalPages = (int) ceil($itemsTotal / $itemsPerPage);
                                    $itemsSlice = collect($u->items)->slice(($itemsPage-1)*$itemsPerPage, $itemsPerPage);
                                @endphp
                                @if($itemsTotal > 0)
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($itemsSlice as $item)
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
                                    @if($itemsTotalPages > 1)
                                    <div style="display:flex;justify-content:center;margin:1rem 0;gap:0.5rem;">
                                        <nav aria-label="Items pagination">
                                            <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                                                <li>
                                                    <a href="?items_page_{{ $u->id }}=1" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                                                </li>
                                                <li>
                                                    <a href="?items_page_{{ $u->id }}={{ max(1,$itemsPage-1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                                                </li>
                                                @for($i=1;$i<=$itemsTotalPages;$i++)
                                                <li>
                                                    <a href="?items_page_{{ $u->id }}={{ $i }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                                                </li>
                                                @endfor
                                                <li>
                                                    <a href="?items_page_{{ $u->id }}={{ min($itemsTotalPages,$itemsPage+1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==$itemsTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                                                </li>
                                                <li>
                                                    <a href="?items_page_{{ $u->id }}={{ $itemsTotalPages }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==$itemsTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    @endif
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">📋</div>
                                        <div class="empty-text">No items available</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($userTotalPages > 1)
            <div style="display:flex;justify-content:center;margin:2rem 0;gap:0.5rem;">
                <div style="background:#fff;padding:1.2rem 2rem;border-radius:14px;box-shadow:0 4px 16px rgba(0,0,0,0.08);display:inline-block;">
                    <nav aria-label="User cards pagination">
                        <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                            <li>
                                <a href="?user_page=1" style="padding:0.4rem 1rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $userPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                            </li>
                            <li>
                                <a href="?user_page={{ max(1,$userPage-1) }}" style="padding:0.4rem 1rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $userPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                            </li>
                            @for($i=1;$i<=$userTotalPages;$i++)
                            <li>
                                <a href="?user_page={{ $i }}" style="padding:0.4rem 1rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $userPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                            </li>
                            @endfor
                            <li>
                                <a href="?user_page={{ min($userTotalPages,$userPage+1) }}" style="padding:0.4rem 1rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $userPage==$userTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                            </li>
                            <li>
                                <a href="?user_page={{ $userTotalPages }}" style="padding:0.4rem 1rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $userPage==$userTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            @endif
                <!-- Additional Pictures Section: Displayed after all user cards -->
              <div class="image-row">
    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb" alt="Nature 1">
    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="Nature 2">
    <img src="https://images.unsplash.com/photo-1493244040629-496f6d136cc3" alt="Nature 3">
</div>


            

<!-- Summary Row: Replaces image-row -->
<div class="summary-row">
    <div class="summary-card">
        <div class="summary-number">
            @if($user->is_admin)
                {{ \App\Models\Item::count() }}
            @else
                {{ count($items) }}
            @endif
        </div>
        <div class="summary-label">Items</div>
    </div>
    <div class="summary-card">
        <div class="summary-number">
            @if($user->is_admin)
                {{ \App\Models\Category::count() }}
            @else
                {{ count($categories) }}
            @endif
        </div>
        <div class="summary-label">Categories</div>
    </div>
    <div class="summary-card">
        <div class="summary-number">
            @if($user->is_admin)
                {{ \App\Models\Brand::count() }}
            @else
                {{ count($brands) }}
            @endif
        </div>
        <div class="summary-label">Brands</div>
    </div>
</div>

<!-- Charts Section -->
<div style="max-width: 900px; margin: 3rem auto; display: flex; gap: 2rem; flex-wrap: wrap; justify-content: center;">
    <div style="flex: 1 1 400px; background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;"
         onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.15)';"
         onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';">
        <h4 style="text-align:center; margin-bottom:1rem; color:#2d3748;">📊 Summary Bar Chart</h4>
        <canvas id="barChart"></canvas>
    </div>

    <div style="flex: 1 1 300px; background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;"
         onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.15)';"
         onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';">
        <h4 style="text-align:center; margin-bottom:1rem; color:#2d3748;">🥧 Summary Pie Chart</h4>
        <canvas id="pieChart"></canvas>
    </div>
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
                            @php
                                $brandsPerPage = 3;
                                $brandsPage = request()->query('my_brands_page', 1);
                                $brandsTotal = count($brands);
                                $brandsTotalPages = (int) ceil($brandsTotal / $brandsPerPage);
                                $brandsSlice = collect($brands)->slice(($brandsPage-1)*$brandsPerPage, $brandsPerPage);
                            @endphp
                            @if($brandsTotal > 0)
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brandsSlice as $brand)
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
                                @if($brandsTotalPages > 1)
                                <div style="display:flex;justify-content:center;margin:1rem 0;gap:0.5rem;">
                                    <nav aria-label="Brands pagination">
                                        <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                                            <li>
                                                <a href="?my_brands_page=1" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                                            </li>
                                            <li>
                                                <a href="?my_brands_page={{ max(1,$brandsPage-1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                                            </li>
                                            @for($i=1;$i<=$brandsTotalPages;$i++)
                                            <li>
                                                <a href="?my_brands_page={{ $i }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                                            </li>
                                            @endfor
                                            <li>
                                                <a href="?my_brands_page={{ min($brandsTotalPages,$brandsPage+1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==$brandsTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                                            </li>
                                            <li>
                                                <a href="?my_brands_page={{ $brandsTotalPages }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $brandsPage==$brandsTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                @endif
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
                            @php
                                $categoriesPerPage = 3;
                                $categoriesPage = request()->query('my_categories_page', 1);
                                $categoriesTotal = count($categories);
                                $categoriesTotalPages = (int) ceil($categoriesTotal / $categoriesPerPage);
                                $categoriesSlice = collect($categories)->slice(($categoriesPage-1)*$categoriesPerPage, $categoriesPerPage);
                            @endphp
                            @if($categoriesTotal > 0)
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categoriesSlice as $category)
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
                                @if($categoriesTotalPages > 1)
                                <div style="display:flex;justify-content:center;margin:1rem 0;gap:0.5rem;">
                                    <nav aria-label="Categories pagination">
                                        <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                                            <li>
                                                <a href="?my_categories_page=1" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                                            </li>
                                            <li>
                                                <a href="?my_categories_page={{ max(1,$categoriesPage-1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                                            </li>
                                            @for($i=1;$i<=$categoriesTotalPages;$i++)
                                            <li>
                                                <a href="?my_categories_page={{ $i }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                                            </li>
                                            @endfor
                                            <li>
                                                <a href="?my_categories_page={{ min($categoriesTotalPages,$categoriesPage+1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==$categoriesTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                                            </li>
                                            <li>
                                                <a href="?my_categories_page={{ $categoriesTotalPages }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $categoriesPage==$categoriesTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                @endif
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
                            @php
                                $itemsPerPage = 3;
                                $itemsPage = request()->query('my_items_page', 1);
                                $itemsTotal = count($items);
                                $itemsTotalPages = (int) ceil($itemsTotal / $itemsPerPage);
                                $itemsSlice = collect($items)->slice(($itemsPage-1)*$itemsPerPage, $itemsPerPage);
                            @endphp
                            @if($itemsTotal > 0)
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($itemsSlice as $item)
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
                                @if($itemsTotalPages > 1)
                                <div style="display:flex;justify-content:center;margin:1rem 0;gap:0.5rem;">
                                    <nav aria-label="Items pagination">
                                        <ul style="display:flex;list-style:none;padding:0;margin:0;gap:0.5rem;">
                                            <li>
                                                <a href="?my_items_page=1" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==1?'background:#FF8C00;color:white;':'' }}">First</a>
                                            </li>
                                            <li>
                                                <a href="?my_items_page={{ max(1,$itemsPage-1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==1?'opacity:0.5;pointer-events:none;':'' }}">Prev</a>
                                            </li>
                                            @for($i=1;$i<=$itemsTotalPages;$i++)
                                            <li>
                                                <a href="?my_items_page={{ $i }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==$i?'background:#FF8C00;color:white;':'' }}">{{ $i }}</a>
                                            </li>
                                            @endfor
                                            <li>
                                                <a href="?my_items_page={{ min($itemsTotalPages,$itemsPage+1) }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==$itemsTotalPages?'opacity:0.5;pointer-events:none;':'' }}">Next</a>
                                            </li>
                                            <li>
                                                <a href="?my_items_page={{ $itemsTotalPages }}" style="padding:0.3rem 0.7rem;border-radius:6px;border:1px solid #FF8C00;color:#FF8C00;text-decoration:none;{{ $itemsPage==$itemsTotalPages?'background:#FF8C00;color:white;':'' }}">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                @endif
                            @else
                                <div class="empty-state">
                                    <div class="empty-icon">📋</div>
                                    <div class="empty-text">No items available</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Additional Pictures Section: Displayed after all personal cards -->
                <div class="image-row">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb" alt="Nature 1">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="Nature 2">
                    <img src="https://images.unsplash.com/photo-1493244040629-496f6d136cc3" alt="Nature 3">
                </div>

                <!-- Summary Row: Replaces image-row -->
                <div class="summary-row">
                    <div class="summary-card">
                        <div class="summary-number">{{ count($items) }}</div>
                        <div class="summary-label">Items</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-number">{{ count($categories) }}</div>
                        <div class="summary-label">Categories</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-number">{{ count($brands) }}</div>
                        <div class="summary-label">Brands</div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div style="max-width: 900px; margin: 3rem auto; display: flex; gap: 2rem; flex-wrap: wrap; justify-content: center;">
                    <div style="flex: 1 1 400px; background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.15)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';">
                        <h4 style="text-align:center; margin-bottom:1rem; color:#2d3748;">📊 Summary Bar Chart</h4>
                        <canvas id="barChart"></canvas>
                    </div>
                    <div style="flex: 1 1 300px; background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.15)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)';">
                        <h4 style="text-align:center; margin-bottom:1rem; color:#2d3748;">🥧 Summary Pie Chart</h4>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Grab summary values from blade
    const items = {{ $user->is_admin ? \App\Models\Item::count() : count($items) }};
    const categories = {{ $user->is_admin ? \App\Models\Category::count() : count($categories) }};
    const brands = {{ $user->is_admin ? \App\Models\Brand::count() : count($brands) }};

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Items', 'Categories', 'Brands'],
            datasets: [{
                label: 'Counts',
                data: [items, categories, brands],
                backgroundColor: ['#FF8C00', '#00BFFF', '#32CD32']
            }]
        },
        
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Items', 'Categories', 'Brands'],
            datasets: [{
                data: [items, categories, brands],
                backgroundColor: ['#FF8C00', '#00BFFF', '#32CD32']
            }]
        },
        options: { responsive: true }
    });
});
</script>


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