{{-- filepath: resources/views/items/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .form-container {
         background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 10%, #f8fafc 90%);
        min-height: 100vh;
        padding: 2rem 0;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 3rem;
        color: #2d3748;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 2rem;
    }
    
    .page-title {
        color: #2d3748;
        font-size: 2rem;
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
        content: '✏️';
        margin-right: 0.5rem;
        font-size: 1.8rem;
    }
    
    .form-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    
    .form-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(74, 85, 104, 0.08);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        position: relative;
    }
    
    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
        border-radius: 16px 16px 0 0;
    }
    
    .form-header-card {
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 140, 0, 0.1) 100%);
        padding: 1.5rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 140, 0, 0.2);
    }
    
    .form-subtitle {
        color: #FF8C00;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0 0 0.25rem 0;
    }
    
    .form-description {
        color: rgba(255, 140, 0, 0.7);
        font-size: 0.9rem;
        margin: 0;
    }
    
    .item-info {
        background: white;
        padding: 0.75rem 1rem;
        border-radius: 16px;
        margin-top: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .item-info-text {
        color: #FF8C00;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .item-code-display {
        background: rgba(255, 140, 0, 0.1);
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        font-family: 'Monaco', 'Menlo', monospace;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
    }
    
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    
    .form-label {
        color: #2d3748;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-label.required::after {
        content: '*';
        color: #e53e3e;
        font-weight: bold;
    }
    
    .form-input,
    .form-select {
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.9rem;
        color: #2d3748;
        background: white;
        transition: all 0.2s ease;
        outline: none;
    }
    
    .form-input:focus,
    .form-select:focus {
        border-color: #FF8C00;
        box-shadow: 0 0 0 3px rgba(255, 140, 0, 0.1);
        background: rgba(255, 140, 0, 0.02);
    }
    
    .form-input:hover,
    .form-select:hover {
        border-color: rgba(255, 140, 0, 0.5);
    }
    
    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23FF8C00' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.7rem center;
        background-size: 1em;
        padding-right: 2.5rem;
    }
    
    .form-file-input {
        padding: 0.75rem;
        border: 2px dashed #e2e8f0;
        border-radius: 8px;
        background: rgba(255, 140, 0, 0.02);
        transition: all 0.2s ease;
        text-align: center;
        position: relative;
        cursor: pointer;
    }
    
    .form-file-input:hover {
        border-color: rgba(255, 140, 0, 0.5);
        background: rgba(255, 140, 0, 0.05);
    }
    
    .form-file-input input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    .file-input-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem;
    }
    
    .file-input-icon {
        font-size: 2rem;
        color: #FF8C00;
    }
    
    .file-input-text {
        color: #4a5568;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    .file-input-subtext {
        color: #718096;
        font-size: 0.75rem;
    }
    
    .current-attachment {
        background: rgba(66, 153, 225, 0.1);
        border: 1px solid rgba(66, 153, 225, 0.2);
        border-radius: 8px;
        padding: 0.75rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .attachment-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #4299e1;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .attachment-view-btn {
        background: #4299e1;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    
    .attachment-view-btn:hover {
        background: #3182ce;
        text-decoration: none;
        color: white;
        transform: translateY(-1px);
    }
    
    .label-icon {
        font-size: 1rem;
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        padding-top: 1.5rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #FF8C00, rgba(255, 140, 0, 0.8));
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
        min-width: 140px;
        justify-content: center;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.9), #FF8C00);
    }
    
    .btn-primary::before {
        content: '🔄';
        font-size: 1rem;
    }
    
    .btn-secondary {
        background: white;
        color: #4a5568;
        padding: 0.875rem 2rem;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        min-width: 140px;
        justify-content: center;
    }
    
    .btn-secondary:hover {
        background: #f8fafc;
        border-color: rgba(255, 140, 0, 0.3);
        color: #FF8C00;
        text-decoration: none;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-secondary::before {
        content: '↩️';
        font-size: 1rem;
    }
    
    .status-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
    }
    
    .status-option {
        position: relative;
    }
    
    .status-radio {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .status-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: white;
        font-weight: 500;
        color: #4a5568;
    }
    
    .status-radio:checked + .status-label {
        border-color: #FF8C00;
        background: rgba(255, 140, 0, 0.05);
        color: #FF8C00;
        box-shadow: 0 0 0 3px rgba(255, 140, 0, 0.1);
    }
    
    .status-label:hover {
        border-color: rgba(255, 140, 0, 0.5);
        background: rgba(255, 140, 0, 0.02);
    }
    
    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    
    .status-active .status-indicator {
        background: #48bb78;
        box-shadow: 0 0 0 2px rgba(72, 187, 120, 0.3);
    }
    
    .status-inactive .status-indicator {
        background: #ed8936;
        box-shadow: 0 0 0 2px rgba(237, 137, 54, 0.3);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .form-content {
            padding: 0 1rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .form-body {
            padding: 1.5rem 1rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn-primary,
        .btn-secondary {
            width: 100%;
        }
        
        .status-options {
            grid-template-columns: 1fr;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .current-attachment {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }
    
    @media (max-width: 480px) {
        .form-card {
            margin: 0 0.5rem;
        }
        
        .form-header {
            padding: 0 1rem;
        }
        
        .page-title {
            font-size: 1.3rem;
        }
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h1 class="page-title">Edit Item</h1>
    </div>
    
    <div class="form-content">
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
        <div class="form-card">
            <div class="form-header-card">
                <h2 class="form-subtitle">Update Item Details</h2>
                <p class="form-description">Modify the information below to update this item</p>
                <div class="item-info">
                    <span class="item-info-text">
                        Currently editing: <span class="item-code-display">{{ $item->code }}</span>
                    </span>
                </div>
            </div>
            
            <div class="form-body">
                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="brand_id" class="form-label required">
                                <span class="label-icon">🏷️</span>
                                Brand
                            </label>
                            <select name="brand_id" id="brand_id" class="form-select" required>
                                <option value="">Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $item->brand_id) == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="form-error" style="color:#e53e3e;font-size:0.85em;margin-top:0.25em;">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="category_id" class="form-label required">
                                <span class="label-icon">📁</span>
                                Category
                            </label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="form-error" style="color:#e53e3e;font-size:0.85em;margin-top:0.25em;">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="code" class="form-label required">
                                <span class="label-icon">🔢</span>
                                Item Code
                            </label>
                            <input type="text" name="code" id="code" class="form-input" value="{{ old('code', $item->code) }}" placeholder="Enter item code" required>
                            @error('code')
                                <div class="form-error" style="color:#e53e3e;font-size:0.85em;margin-top:0.25em;">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="form-label required">
                                <span class="label-icon">📝</span>
                                Item Name
                            </label>
                            <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $item->name) }}" placeholder="Enter item name" required>
                            @error('name')
                                <div class="form-error" style="color:#e53e3e;font-size:0.85em;margin-top:0.25em;">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group full-width">
                            <label class="form-label">
                                <span class="label-icon">⚡</span>
                                Status
                            </label>
                            <div class="status-options">
                                <div class="status-option">
                                    <input type="radio" name="status" id="status_active" value="Active" class="status-radio" {{ old('status', $item->status) == 'Active' ? 'checked' : '' }}>
                                    <label for="status_active" class="status-label status-active">
                                        <span class="status-indicator"></span>
                                        Active
                                    </label>
                                </div>
                                <div class="status-option">
                                    <input type="radio" name="status" id="status_inactive" value="Inactive" class="status-radio" {{ old('status', $item->status) == 'Inactive' ? 'checked' : '' }}>
                            @error('status')
                                <div class="form-error" style="color:#e53e3e;font-size:0.85em;margin-top:0.25em;">{{ $message }}</div>
                            @enderror
                                    <label for="status_inactive" class="status-label status-inactive">
                                        <span class="status-indicator"></span>
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group full-width">
                            <label class="form-label">
                                <span class="label-icon">📎</span>
                                Attachment
                            </label>
                            
                            @if($item->attachment)
                                <div class="current-attachment">
                                    <div class="attachment-info">
                                        <span>📄</span>
                                        <span>Current file attached</span>
                                    </div>
                                    <a href="{{ asset('storage/'.$item->attachment) }}" target="_blank" class="attachment-view-btn">
                                        👁️ View Current
                                    </a>
                                </div>
                            @endif
                            
                            <div class="form-file-input">
                                <input type="file" name="attachment" id="attachment">
                                @error('attachment')
                                    <div class="form-error" style="color:#e53e3e;font-size:0.85em;margin-top:0.25em;">{{ $message }}</div>
                                @enderror
                                <div class="file-input-content">
                                    <div class="file-input-icon">📁</div>
                                    <div class="file-input-text">
                                        @if($item->attachment)
                                            Click to replace current file
                                        @else
                                            Click to upload file
                                        @endif
                                    </div>
                                    <div class="file-input-subtext">or drag and drop</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            Update Item
                        </button>
                        <a href="{{ route('items.index') }}" class="btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection