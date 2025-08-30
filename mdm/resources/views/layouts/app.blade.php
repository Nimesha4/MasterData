<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 10%, #f8fafc 90%);">
    <div class="min-h-screen">

            <!-- Welcome-style Header -->
            <header class="header">
                <nav class="nav">
                    <a href="/" class="logo">
                        <div class="logo-icon">B</div>
                        BrandHub
                    </a>
                    <div class="nav-links">
                        <a href="{{ route('dashboard') }}" class="nav-link{{ request()->routeIs('dashboard') ? ' primary' : '' }}">Dashboard</a>
                        <a href="{{ route('items.index') }}" class="nav-link{{ request()->routeIs('items.*') ? ' primary' : '' }}">Items</a>
                        <a href="{{ route('categories.index') }}" class="nav-link{{ request()->routeIs('categories.*') ? ' primary' : '' }}">Categories</a>
                        <a href="{{ route('brands.index') }}" class="nav-link{{ request()->routeIs('brands.*') ? ' primary' : '' }}">Brands</a>
                        <a href="{{ route('profile.edit') }}" class="nav-link{{ request()->routeIs('profile.edit') ? ' primary' : '' }}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="nav-link" style="background:none;border:none;cursor:pointer;">Logout</button>
                        </form>
                    </div>
                </nav>
            </header>

            <!-- Page Content -->
            <main>
                

                @yield('content')

                @include('layouts.footer')
            </main>
        </div>
    <style>
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 0 0 32px 32px;
            padding: 8px 24px;
            margin: 20px auto 0 auto;
            max-width: 1250px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 10;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 28px;
            font-weight: 700;
            color: #FF8C00;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .logo:hover {
            transform: scale(1.05);
        }
        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #FF8C00 0%, #FF6B35 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 18px;
        }
        .nav-links {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .nav-link {
            padding: 8px 16px;
            text-decoration: none;
            color: #334155;
            border-radius: 10px;
            font-weight: 500;
            font-size: 17px;
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-link:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
        }
        .nav-link.primary {
            background: linear-gradient(135deg, #FF8C00 0%, #e07a00 100%);
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.4);
        }
        .nav-link.primary:hover {
            background: linear-gradient(135deg, #e07a00 0%, #FF6B35 100%);
            box-shadow: 0 6px 25px rgba(255, 140, 0, 0.6);
            transform: translateY(-3px);
        }
    </style>
    </body>
</html>
