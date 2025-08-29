@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
        padding: 2rem 0;
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
    
    .form-container {
        max-width: 600px;
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
    }
    
    .form-header {
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 140, 0, 0.1) 100%);
        padding: 2rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 140, 0, 0.1);
    }
    
    .form-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: linear-gradient(135deg, #FF8C00, rgba(255, 140, 0, 0.8));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
    }
    
    .form-title {
        color: #1a202c;
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }
    
    .form-subtitle {
        color: #718096;
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
    
    .form-content {
        padding: 2rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        color: #2d3748;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        color: #2d3748;
        background: white;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #FF8C00;
        box-shadow: 0 0 0 3px rgba(255, 140, 0, 0.1);
        background: rgba(255, 140, 0, 0.02);
    }
    
    .form-control:hover {
        border-color: rgba(255, 140, 0, 0.4);
    }
    
    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23FF8C00' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
    
    .btn-group {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .btn {
        flex: 1;
        padding: 0.8rem 1.0rem;
        border: 2px solid;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #FF8C00, rgba(255, 140, 0, 0.9));
        color: white;
        border-color: #FF8C00;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.9), #FF8C00);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
        text-decoration: none;
        color: white;
    }
    
    .btn-secondary {
        background: white;
        color: #718096;
        border-color: #e2e8f0;
    }
    
    .btn-secondary:hover {
        background: #f8fafc;
        color: #2d3748;
        border-color: #cbd5e0;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(74, 85, 104, 0.1);
        text-decoration: none;
    }
    
    .input-icon {
        position: relative;
    }
    
    .input-icon::before {
        content: attr(data-icon);
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 140, 0, 0.6);
        font-size: 1rem;
        z-index: 1;
    }
    
    .input-icon .form-control {
        padding-left: 2.5rem;
    }
    
    .status-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0;
    }
    
    .status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }
    
    .status-active .status-indicator {
        background: #48bb78;
    }
    
    .status-inactive .status-indicator {
        background: #f56565;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 0 1rem;
        }
        
        .form-content {
            padding: 1.5rem;
        }
        
        .form-header {
            padding: 1.5rem;
        }
        
        .btn-group {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
    }
    
    /* Animation for form appearance */
    .form-card {
        animation: slideInUp 0.4s ease-out;
    }
    
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .form-group {
        animation: fadeIn 0.5s ease-out;
        animation-fill-mode: both;
    }
    
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<div class="dashboard-container">
    <div class="container-fluid">
        <h2 class="section-title">🏷️ Edit Brand</h2>
        
        <div class="form-container">
            <div class="form-card">
                <div class="form-header">
                    <div class="form-icon">🏪</div>
                    <h3 class="form-title">Update Brand Details</h3>
                    <div class="form-subtitle">Modify the brand information below</div>
                </div>
                
                <div class="form-content">
                    <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label class="form-label" for="code">Brand Code</label>
                            <div class="input-icon" data-icon="🏷️">
                                <input 
                                    type="text" 
                                    id="code"
                                    name="code" 
                                    class="form-control" 
                                    value="{{ $brand->code }}" 
                                    required
                                    placeholder="Enter brand code"
                                >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="name">Brand Name</label>
                            <div class="input-icon" data-icon="🏪">
                                <input 
                                    type="text" 
                                    id="name"
                                    name="name" 
                                    class="form-control" 
                                    value="{{ $brand->name }}" 
                                    required
                                    placeholder="Enter brand name"
                                >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control form-select">
                                <option value="Active" {{ $brand->status=='Active'?'selected':'' }} class="status-option status-active">
                                    ✅ Active
                                </option>
                                <option value="Inactive" {{ $brand->status=='Inactive'?'selected':'' }} class="status-option status-inactive">
                                    ❌ Inactive
                                </option>
                            </select>
                        </div>
                        
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">
                                💾 Update Brand
                            </button>
                            <a href="{{ route('brands.index') }}" class="btn btn-secondary">
                                ↩️ Back to Brands
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add focus and blur effects
    const inputs = document.querySelectorAll('.form-control');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
    
    // Form validation feedback
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('.btn-primary');
        submitBtn.innerHTML = '⏳ Updating...';
        submitBtn.disabled = true;
    });
});
</script>

@endsection