@extends('layouts.app')

@section('content')
<style>
    body {
    background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 10%, #f8fafc 90%);
    min-height: 100vh;
    }

    .profile-card {
        max-width: 500px;
        margin: 40px auto;
        background: white;
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(255, 140, 0, 0.15), 0 0 0 1px rgba(255, 140, 0, 0.08);
        padding: 2.5rem 2rem 2rem 2rem;
        position: relative;
        z-index: 10;
    }
    .profile-card h1 {
        text-align: center;
        font-size: 2rem;
        font-weight: 600;
        color: #FF8C00;
        margin-bottom: 1.5rem;
    }
    .profile-form label {
        display: block;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #2d3748;
    }
    .profile-form input[type="text"],
    .profile-form input[type="email"],
    .profile-form input[type="password"] {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        margin-bottom: 1.25rem;
        font-size: 1rem;
        background: #f8fafc;
        transition: border 0.2s;
    }
    .profile-form input:focus {
        border-color: #FF8C00;
        outline: none;
    }
    .profile-form button[type="submit"] {
        background: linear-gradient(90deg, #FF8C00, #ffa94d);
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-size: 1rem;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.08);
        transition: background 0.2s;
        margin-top: 0.5rem;
    }
    .profile-form button[type="submit"]:hover {
        background: linear-gradient(90deg, #ffa94d, #FF8C00);
    }
    .delete-form button[type="submit"] {
        background: #fff0e6;
        color: #d90429;
        border: 1px solid #ffd6b3;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        margin-top: 1.5rem;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }
    .delete-form button[type="submit"]:hover {
        background: #ffe5d0;
        color: #b3001b;
    }
</style>
<div class="profile-card">
    <h1>Profile</h1>
    <form class="profile-form" method="POST" action="{{ route('profile.update') }}" style="margin-bottom:0;">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div id="password-section" style="display:none;">
            <label for="password">Change Password</label>
            <input type="password" id="password" name="password" autocomplete="new-password">
        </div>
        <div class="profile-actions" style="display:flex;gap:1rem;align-items:center;justify-content:flex-end;margin-top:1.5rem;">
            <button type="button" id="show-password-btn">Update Profile</button>
            <form class="delete-form" method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');" style="margin:0;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Account</button>
            </form>
        </div>
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showBtn = document.getElementById('show-password-btn');
        var pwdSection = document.getElementById('password-section');
        var form = showBtn ? showBtn.closest('form') : null;
        if(showBtn && pwdSection && form) {
            let revealed = false;
            showBtn.addEventListener('click', function(e) {
                if (!revealed) {
                    e.preventDefault();
                    pwdSection.style.display = 'block';
                    showBtn.textContent = 'Update Profile';
                    revealed = true;
                } else {
                    // Now submit the form
                    form.submit();
                }
            });
        }
    });
</script>
    </form>
</style>
<style>
    .profile-actions form {
        display: inline;
    }
</style>
</div>
@endsection
