{{-- filepath: resources/views/categories/create.blade.php --}}
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
        max-width: 700px;
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
        content: '📁';
        margin-right: 0.5rem;
        font-size: 1.8rem;
    }
    
    .form-content {
        max-width: 700px;
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
        padding: 2rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 140, 0, 0.2);
    }
    
    .form-subtitle {
        color: #FF8C00;
        font-size: 1.2rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
    }
    
    .form-description {
        color: rgba(255, 140, 0, 0.7);
        font-size: 0.95rem;
        margin: 0;
        line-height: 1.5;
    }
    
    .form-body {
        padding: 2.5rem;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
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
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-label.required::after {
        content: '*';
        color: #e53e3e;
        font-weight: bold;
        font-size: 1.1rem;
    }
    
    .form-input {
        padding: 1rem 1.25rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        color: #2d3748;
        background: white;
        transition: all 0.3s ease;
        outline: none;
        font-weight: 500;
    }
    
    .form-input:focus {
        border-color: #FF8C00;
        box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
        background: rgba(255, 140, 0, 0.02);
        transform: translateY(-1px);
    }
    
    .form-input:hover {
        border-color: rgba(255, 140, 0, 0.5);
        background: rgba(255, 140, 0, 0.01);
    }
    
    .label-icon {
        font-size: 1.1rem;
    }
    
    .status-section {
        margin-top: 1rem;
    }
    
    .status-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 0.75rem;
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
        gap: 1rem;
        padding: 1.25rem 1.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
        font-weight: 500;
        color: #4a5568;
        font-size: 1rem;
    }
    
    .status-radio:checked + .status-label {
        border-color: #FF8C00;
        background: rgba(255, 140, 0, 0.08);
        color: #FF8C00;
        box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
        transform: translateY(-1px);
    }
    
    .status-label:hover {
        border-color: rgba(255, 140, 0, 0.5);
        background: rgba(255, 140, 0, 0.03);
        transform: translateY(-1px);
    }
    
    .status-indicator {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        flex-shrink: 0;
        position: relative;
    }
    
    .status-active .status-indicator {
        background: #48bb78;
        box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.3);
    }
    
    .status-inactive .status-indicator {
        background: #ed8936;
        box-shadow: 0 0 0 3px rgba(237, 137, 54, 0.3);
    }
    
    .status-text {
        font-weight: 600;
    }
    
    .form-actions {
        display: flex;
        gap: 1.25rem;
        justify-content: center;
        padding-top: 2rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #FF8C00, rgba(255, 140, 0, 0.8));
        color: white;
        padding: 0.1rem 0.9rem;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        min-width: 160px;
        justify-content: center;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.9), #FF8C00);
    }
    
    .btn-primary::before {
        content: '💾';
        font-size: 1.1rem;
    }
    
    .btn-secondary {
        background: white;
        color: #4a5568;
        padding: 1rem 2.5rem;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        min-width: 160px;
        justify-content: center;
    }
    
    .btn-secondary:hover {
        background: #f8fafc;
        border-color: rgba(255, 140, 0, 0.3);
        color: #FF8C00;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .btn-secondary::before {
        content: '↩️';
        font-size: 1.1rem;
    }
    
    /* Help Text */
    .field-help {
        font-size: 0.85rem;
        color: #718096;
        margin-top: 0.5rem;
        line-height: 1.4;
    }
    
    .code-preview {
        background: rgba(255, 140, 0, 0.08);
        border: 1px solid rgba(255, 140, 0, 0.2);
        border-radius: 6px;
        padding: 0.5rem 0.75rem;
        margin-top: 0.5rem;
        font-family: 'Monaco', 'Menlo', monospace;
        font-size: 0.8rem;
        color: #FF8C00;
        font-weight: 600;
    }
    
    /* Visual Enhancement */
    .form-icon {
        position: absolute;
        top: 50%;
        right: 1rem;
        transform: translateY(-50%);
        color: rgba(255, 140, 0, 0.4);
        font-size: 1.2rem;
        pointer-events: none;
        transition: all 0.2s ease;
    }
    
    .form-input:focus + .form-icon {
        color: #FF8C00;
        transform: translateY(-50%) scale(1.1);
    }
    
    .input-wrapper {
        position: relative;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .form-content {
            padding: 0 1rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .form-body {
            padding: 2rem 1.5rem;
        }
        
        .form-header-card {
            padding: 1.5rem;
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
            font-size: 1.6rem;
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
            font-size: 1.4rem;
        }
        
        .form-input {
            padding: 0.875rem 1rem;
        }
        
        .status-label {
            padding: 1rem;
        }
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h1 class="page-title">Add New Category</h1>
    </div>
    
    <div class="form-content">
        <div class="form-card">
            <div class="form-header-card">
                <h2 class="form-subtitle">Create Category</h2>
                <p class="form-description">Add a new category to organize your products and inventory effectively</p>
            </div>
            
            <div class="form-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="code" class="form-label required">
                                <span class="label-icon">🔢</span>
                                Category Code
                            </label>
                            <div class="input-wrapper">
                                <input type="text" name="code" id="code" class="form-input" placeholder="e.g., ELEC001" required>
                                <span class="form-icon">📋</span>
                            </div>
                            <div class="field-help">Enter a unique code identifier for this category</div>
                            <div class="code-preview" id="codePreview" style="display: none;"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="form-label required">
                                <span class="label-icon">📝</span>
                                Category Name
                            </label>
                            <div class="input-wrapper">
                                <input type="text" name="name" id="name" class="form-input" placeholder="e.g., Electronics" required>
                                <span class="form-icon">🏷️</span>
                            </div>
                            <div class="field-help">Enter a descriptive name for this category</div>
                        </div>
                        
                        <div class="form-group full-width status-section">
                            <label class="form-label">
                                <span class="label-icon">⚡</span>
                                Category Status
                            </label>
                            <div class="status-options">
                                <div class="status-option">
                                    <input type="radio" name="status" id="status_active" value="Active" class="status-radio" checked>
                                    <label for="status_active" class="status-label status-active">
                                        <span class="status-indicator"></span>
                                        <span class="status-text">Active</span>
                                    </label>
                                </div>
                                <div class="status-option">
                                    <input type="radio" name="status" id="status_inactive" value="Inactive" class="status-radio">
                                    <label for="status_inactive" class="status-label status-inactive">
                                        <span class="status-indicator"></span>
                                        <span class="status-text">Inactive</span>
                                    </label>
                                </div>
                            </div>
                            <div class="field-help">Choose whether this category should be available for use</div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            Save Category
                        </button>
                        <a href="{{ route('categories.index') }}" class="btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Real-time code preview
document.getElementById('code').addEventListener('input', function(e) {
    const codePreview = document.getElementById('codePreview');
    const value = e.target.value.trim();
    
    if (value) {
        codePreview.textContent = 'Preview: ' + value.toUpperCase();
        codePreview.style.display = 'block';
    } else {
        codePreview.style.display = 'none';
    }
});

// Auto-uppercase code input
document.getElementById('code').addEventListener('input', function(e) {
    e.target.value = e.target.value.toUpperCase();
});
</script>

@endsection