{{-- filepath: resources/views/brands/index.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .brands-container {
         background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 10%, #f8fafc 90%);
        min-height: 100vh;
        padding: 2rem 0;
    }
    
    .brands-header {
        text-align: center;
        margin-bottom: 3rem;
        color: #2d3748;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 2rem;
    }
    
    .brands-header h1 {
        font-size: 2.5rem;
        font-weight: 300;
        margin-bottom: 0.5rem;
        color: #1a202c;
    }
    
    .page-title {
        color: #2d3748;
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0 0 2rem 0;
        text-align: center;
        position: relative;
        display: inline-block;
        width: 100%;
    }
    
    .page-title::after {
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
    
    .page-title::before {
        content: '';
        margin-right: 0.5rem;
        font-size: 1.5rem;
    }
    
    .brands-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    
    .action-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        background: white;
        padding: 1.5rem;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(74, 85, 104, 0.08);
        border: 1px solid #e2e8f0;
        position: relative;
    }
    
    .action-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
        border-radius: 16px 16px 0 0;
    }
    
    .brands-count {
        color: #718096;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .brands-count::before {
        content: '';
        font-size: 1.2rem;
    }
    
    .btn-add {
        background: linear-gradient(135deg, #FF8C00, rgba(255, 140, 0, 0.8));
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        text-decoration: none;
        color: white;
    }
    
    .btn-add::before {
        content: '➕';
        font-size: 1rem;
    }
    
    .brands-table-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(74, 85, 104, 0.08);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        position: relative;
    }
    
    .brands-table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
    }
    
    .brands-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .brands-table thead {
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 140, 0, 0.1) 100%);
    }
    
    .brands-table th {
        padding: 1.25rem 1rem;
        text-align: left;
        font-weight: 600;
        color: black;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid rgba(255, 140, 0, 0.2);
        white-space: nowrap;
    }
    
    .brands-table td {
        padding: 1.25rem 1rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        font-size: 0.9rem;
    }
    
    .brands-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .brands-table tbody tr:hover {
        background: rgba(255, 140, 0, 0.05);
        transform: translateX(2px);
    }
    
    .brands-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .brand-id {
        color: #718096;
        font-weight: 00;
        font-family: 'Monaco', 'Menlo', monospace;
        background: rgba(113, 128, 150, 0.1);
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        display: inline-block;
        min-width: 40px;
        text-align: center;
    }
    
    .brand-name {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }
    
    .brand-code {
        color: #4a5568;
        font-size: 0.75rem;
        font-family: 'Monaco', 'Menlo', monospace; 
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        display: inline-block;
        border: none;
        font-weight: 600;
    }
    
    .status-badge {
        padding: 0.3rem 0.875rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: inline-block;
    }
    
    .status-active {
        background: linear-gradient(135deg, #48bb78, rgba(72, 187, 120, 0.8));
        color: white;
        box-shadow: 0 2px 8px rgba(72, 187, 120, 0.3);
    }
    
    .status-inactive {
        background: linear-gradient(135deg, #ed8936, rgba(237, 137, 54, 0.8));
        color: white;
        box-shadow: 0 2px 8px rgba(237, 137, 54, 0.3);
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
    
    .btn-action {
        border: 1px solid rgba(255, 140, 0, 0.3);
        border-radius: 6px;
        padding: 0.4rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        transition: all 0.2s ease;
        cursor: pointer;
        background: rgba(255, 140, 0, 0.05);
        color: #FF8C00;
        white-space: nowrap;
    }
    
    .btn-action:hover {
        background: #FF8C00;
        color: white;
        border-color: #FF8C00;
        text-decoration: none;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.3);
    }
    
    .btn-edit::before {
        content: '✏️';
        font-size: 0.8rem;
    }
    
    .btn-delete {
        color: #e53e3e;
        border-color: rgba(229, 62, 62, 0.3);
        background: rgba(229, 62, 62, 0.05);
    }
    
    .btn-delete:hover {
        background: #e53e3e;
        color: white;
        border-color: #e53e3e;
    }
    
    .btn-delete::before {
        content: '🗑️';
        font-size: 0.8rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #718096;
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(74, 85, 104, 0.08);
        border: 1px solid #e2e8f0;
        position: relative;
    }
    
    .empty-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
        border-radius: 16px 16px 0 0;
    }
    
    .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.6;
    }
    
    .empty-text {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }
    
    .empty-subtext {
        font-size: 0.9rem;
        opacity: 0.8;
    }
    
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(74, 85, 104, 0.08);
        border: 1px solid #e2e8f0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #FF8C00;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #718096;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .brands-table {
            font-size: 0.8rem;
        }
        
        .brands-table th,
        .brands-table td {
            padding: 1rem 0.75rem;
        }
    }
    
    @media (max-width: 768px) {
        .brands-content {
            padding: 0 1rem;
        }
        
        .action-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        .brands-table-container {
            overflow-x: auto;
        }
        
        .brands-table {
            min-width: 600px;
        }
        
        .brands-table th,
        .brands-table td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .btn-action {
            font-size: 0.7rem;
            padding: 0.35rem 0.5rem;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 480px) {
        .page-title {
            font-size: 1.5rem;
        }
        
        .brands-header h1 {
            font-size: 2rem;
        }
        
        .btn-add {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .brands-table {
            min-width: 500px;
        }
    }
</style>

<div class="brands-container">
    <div class="brands-header">
        <!-- <h1 class="page-title">Brands Management</h1> -->
    </div>
    
    <div class="brands-content">
        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ count($brands) }}</div>
                <div class="stat-label">Total Brands</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $brands->where('status', 'Active')->count() }}</div>
                <div class="stat-label">Active Brands</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $brands->where('status', 'Inactive')->count() }}</div>
                <div class="stat-label">Inactive Brands</div>
            </div>
        </div>
        
        <div class="action-header">
            <div class="brands-count">
                Manage your product brands
            </div>
            <form method="GET" action="{{ route('brands.index') }}" style="display:flex;gap:1rem;align-items:center;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." style="padding:0.35rem 0.7rem;border-radius:8px;border:1px solid #e2e8f0;font-size:0.8rem;">
                <button type="submit" class="btn-add" style="padding:0.35rem 0.8rem;font-size:0.8rem;position:relative;z-index:1;">Search</button>
                <style>
                .action-header form .btn-add::before { content: none !important; }
                </style>
            </form>
            <div style="display:flex;gap:0.5rem;">
                <a href="{{ route('brands.export', array_merge(request()->all(), ['type'=>'csv'])) }}" class="btn-add" style="background:linear-gradient(135deg,#4299e1,#63b3ed);padding:0.35rem 0.8rem;font-size:0.8rem;"><span style="font-size:1em;"></span> Export CSV</a>
                <a href="{{ route('brands.export', array_merge(request()->all(), ['type'=>'pdf'])) }}" class="btn-add" style="background:linear-gradient(135deg,#38a169,#68d391);padding:0.35rem 0.8rem;font-size:0.8rem;"><span style="font-size:1em;"></span> Export PDF</a>
            </div>
            @if(!auth()->user()->is_admin)
                <a href="{{ route('brands.create') }}" class="btn-add" style="padding:0.35rem 0.8rem;font-size:0.8rem;">
                    Add New Brand
                </a>
            @endif
        </div>
        @if(session('success'))
            <div class="alert alert-success" style="background:#d1fae5;color:#065f46;padding:1rem;border-radius:8px;margin-bottom:1rem;">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" style="background:#fee2e2;color:#991b1b;padding:1rem;border-radius:8px;margin-bottom:1rem;">
                <ul style="margin:0;padding-left:1.2em;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if($brands->count() > 0)
            <div class="brands-table-container">
                <table class="brands-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>
                                <span class="brand-id">{{ $brand->id }}</span>
                            </td>
                            <td>
                                <span class="brand-code">{{ $brand->code }}</span>
                            </td>
                            <td>
                                <div class="brand-name">{{ $brand->name }}</div>
                            </td>
                            <td>
                                <span class="status-badge {{ strtolower($brand->status) == 'active' ? 'status-active' : 'status-inactive' }}">
                                    {{ $brand->status }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn-action btn-edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this brand?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 2rem; text-align: center;">
                {{ $brands->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">🏷️</div>
                <div class="empty-text">No brands found</div>
                <div class="empty-subtext">Start by creating your first brand to organize your products!</div>
            </div>
        @endif
    </div>
</div>

@endsection