@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label>Change Password:</label>
            <input type="password" name="password" autocomplete="new-password">
        </div>
        <button type="submit">Update Profile</button>
    </form>

    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
        @csrf
        @method('DELETE')
        <button type="submit" style="color:red;">Delete Account</button>
    </form>
</div>
@endsection
