<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BrandHub - Streamline Your Brand Management</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <style>
        :root {
            --primary: #FF8C00;
            --primary-dark: #e07a00;
            --primary-light: rgba(255, 140, 0, 0.1);
            --secondary: #FF6B35;
            --accent: #FFA726;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --dark: #0f172a;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.05"><circle cx="30" cy="30" r="4"/></g></svg>') repeat;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 0 0 24px 24px;
            padding: 20px 40px;
            margin: 20px -20px 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 10;
        }
        
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1360px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
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
            padding: 12px 24px;
            text-decoration: none;
            color: var(--gray-700);
            border-radius: 12px;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            background: var(--gray-100);
            transform: translateY(-2px);
        }
        
        .nav-link.primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.4);
        }
        
        .nav-link.primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary) 100%);
            box-shadow: 0 6px 25px rgba(255, 140, 0, 0.6);
            transform: translateY(-3px);
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 0;
        }
        
        .hero-section {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 80px;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 80px;
            border-radius: 32px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 140, 0, 0.05) 0%, transparent 50%);
            z-index: -1;
        }
        
        .hero-text h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 24px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .hero-text .subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 40px;
            line-height: 1.7;
            font-weight: 400;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            background: var(--gray-50);
            border-radius: 12px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            border-color: rgba(255, 140, 0, 0.2);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }

        .feature-text {
            font-weight: 500;
            color: var(--gray-700);
        }
        
        .cta-buttons {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .btn {
            padding: 16px 32px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(255, 140, 0, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 140, 0, 0.6);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-secondary {
            background: rgba(255, 140, 0, 0.1);
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 140, 0, 0.4);
        }
        
        /* Dashboard Preview */
        .dashboard-preview {
            position: relative;
            perspective: 1000px;
        }
        
        .preview-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transform: rotateY(-10deg) rotateX(5deg);
            transition: all 0.5s ease;
            border: 1px solid var(--gray-200);
        }
        
        .preview-card:hover {
            transform: rotateY(0deg) rotateX(0deg) scale(1.02);
        }
        
        .preview-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--gray-100);
        }

        .preview-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-800);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
            padding: 16px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: rgba(255, 140, 0, 0.3);
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.1);
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--gray-600);
            margin-top: 4px;
        }
        
        .items-list {
            list-style: none;
            margin: 0;
        }
        
        .items-list li {
            padding: 12px 16px;
            margin: 8px 0;
            background: var(--gray-50);
            border-radius: 10px;
            border-left: 4px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .items-list li:hover {
            background: var(--primary);
            color: white;
            transform: translateX(8px);
        }

        .item-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
        }

        .brand-icon { 
            background: linear-gradient(135deg, var(--primary), var(--secondary)); 
            color: white; 
        }
        .category-icon { 
            background: linear-gradient(135deg, var(--accent), var(--primary)); 
            color: white; 
        }
        .product-icon { 
            background: linear-gradient(135deg, var(--secondary), var(--accent)); 
            color: white; 
        }
        
        /* Floating Elements */
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: floatShape 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 80px;
            height: 80px;
            background: var(--primary);
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 60px;
            height: 60px;
            background: var(--secondary);
            bottom: 20%;
            left: 5%;
            animation-delay: -2s;
        }

        .floating-shape:nth-child(3) {
            width: 40px;
            height: 40px;
            background: var(--accent);
            top: 60%;
            right: 20%;
            animation-delay: -4s;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-section {
                grid-template-columns: 1fr;
                gap: 50px;
                padding: 50px;
            }

            .hero-text h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .header {
                padding: 15px 20px;
                margin: 15px -15px 0;
            }
            
            .hero-section {
                padding: 40px 30px;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .nav {
                flex-direction: column;
                gap: 20px;
            }
            
            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .preview-card {
                transform: none;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }
        }
        
        /* Loading Animation */
        .hero-section {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 0.3s;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-item {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .feature-item:nth-child(1) { animation-delay: 0.5s; }
        .feature-item:nth-child(2) { animation-delay: 0.6s; }
        .feature-item:nth-child(3) { animation-delay: 0.7s; }
        .feature-item:nth-child(4) { animation-delay: 0.8s; }
        .feature-item:nth-child(5) { animation-delay: 0.9s; }
        .feature-item:nth-child(6) { animation-delay: 1.0s; }

        /* Trust indicators */
        .trust-badges {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--gray-200);
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-600);
            font-size: 0.875rem;
        }

        .trust-icon {
            width: 20px;
            height: 20px;
            background: var(--success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 600;
        }

        /* Enhanced brand styling */
        .preview-header .logo-icon {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    
    <div class="container">
        <header class="header">
            <nav class="nav">
                <a href="#" class="logo">
                    <div class="logo-icon">B</div>
                    BrandHub
                </a>
                <div class="nav-links">
                    <!-- Replace with your Laravel auth logic -->
                    <!-- @auth -->
                        <!-- <a href="{{ url('/dashboard') }}" class="nav-link primary">Dashboard</a> -->
                    <!-- @else -->
                        <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                        <a href="{{ route('register') }}"  class="nav-link primary">Get Started Free</a>
                    <!-- @endauth -->
                </div>
            </nav>
        </header>

        <main class="main-content">
            <section class="hero-section">
                <div class="floating-elements">
                    <div class="floating-shape"></div>
                    <div class="floating-shape"></div>
                    <div class="floating-shape"></div>
                </div>

                <div class="hero-text">
                    <h1>Streamline Your Brand Management</h1>
                    <p class="subtitle">Take control of your entire product ecosystem with BrandHub's comprehensive management platform. From brands to categories to individual items - manage it all in one place.</p>
                    
                    <div class="features-grid">
                        <div class="feature-item">
                            <div class="feature-icon">🏢</div>
                            <span class="feature-text">Multi-Brand Management</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📁</div>
                            <span class="feature-text">Smart Categorization</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📦</div>
                            <span class="feature-text">Product Inventory</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">⚡</div>
                            <span class="feature-text">Real-time Updates</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">👥</div>
                            <span class="feature-text">Team Collaboration</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🛡️</div>
                            <span class="feature-text">Admin Controls</span>
                        </div>
                    </div>
                    
                    <div class="cta-buttons">
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Start Managing Today
                            <span>→</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">
                            View Demo
                        </a>
                    </div>

                    <div class="trust-badges">
                        <div class="trust-item">
                            <div class="trust-icon">✓</div>
                            <span>Secure & Reliable</span>
                        </div>
                        <div class="trust-item">
                            <div class="trust-icon">⚡</div>
                            <span>Lightning Fast</span>
                        </div>
                        <div class="trust-item">
                            <div class="trust-icon">📱</div>
                            <span>Mobile Friendly</span>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-preview">
                    <div class="preview-card">
                        <div class="preview-header">
                            <div class="logo-icon">📊</div>
                            <h3 class="preview-title">Your Dashboard</h3>
                        </div>
                        
                        <div class="stats-row">
                            <div class="stat-card">
                                <div class="stat-number">12</div>
                                <div class="stat-label">Active Brands</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">48</div>
                                <div class="stat-label">Categories</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">256</div>
                                <div class="stat-label">Products</div>
                            </div>
                        </div>

                        <ul class="items-list">
                            <li>
                                <div class="item-icon brand-icon">N</div>
                                <span>Nike - Athletic Footwear</span>
                            </li>
                            <li>
                                <div class="item-icon brand-icon">A</div>
                                <span>Apple - Consumer Electronics</span>
                            </li>
                            <li>
                                <div class="item-icon category-icon">👟</div>
                                <span>Running Shoes Collection</span>
                            </li>
                            <li>
                                <div class="item-icon category-icon">📱</div>
                                <span>Smartphone Accessories</span>
                            </li>
                            <li>
                                <div class="item-icon product-icon">🏃</div>
                                <span>Air Max Pro 2024</span>
                            </li>
                            <li>
                                <div class="item-icon product-icon">🎧</div>
                                <span>AirPods Pro Max</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>