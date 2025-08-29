<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Header Component</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0f0f23;
            min-height: 100vh;
        }

        /* Header Container */
        .header {
            position: relative;
            width: 100%;
            background: linear-gradient(135deg, #1e1e2e 0%, #2a2a3e 50%, #1e1e2e 100%);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        /* Animated flowing background */
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent 0%,
                rgba(99, 102, 241, 0.15) 20%,
                rgba(139, 92, 246, 0.2) 40%,
                rgba(236, 72, 153, 0.15) 60%,
                rgba(99, 102, 241, 0.1) 80%,
                transparent 100%
            );
            animation: flow 8s linear infinite;
            z-index: 1;
        }

        @keyframes flow {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(25%);
            }
        }

        /* Floating particles */
        .header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 15% 30%, rgba(99, 102, 241, 0.3) 1px, transparent 1px),
                radial-gradient(circle at 85% 20%, rgba(139, 92, 246, 0.2) 1px, transparent 1px),
                radial-gradient(circle at 45% 70%, rgba(236, 72, 153, 0.25) 1px, transparent 1px),
                radial-gradient(circle at 75% 80%, rgba(99, 102, 241, 0.2) 1px, transparent 1px);
            background-size: 400px 100px, 300px 80px, 350px 90px, 280px 70px;
            animation: sparkle 4s ease-in-out infinite alternate;
            z-index: 1;
        }

        @keyframes sparkle {
            0% {
                opacity: 0.3;
                transform: scale(1) rotate(0deg);
            }
            100% {
                opacity: 0.8;
                transform: scale(1.1) rotate(2deg);
            }
        }

        /* Header content */
        .header-content {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
            height: 70px;
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .logo::before {
            content: '';
            position: absolute;
            inset: -8px;
            background: linear-gradient(45deg, transparent, rgba(99, 102, 241, 0.3), transparent);
            border-radius: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .logo:hover::before {
            opacity: 1;
        }

        .logo:hover {
            transform: translateY(-2px);
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            margin-right: 12px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .logo:hover .logo-icon::before {
            opacity: 1;
            transform: rotate(45deg) translate(50%, 50%);
        }

        /* Navigation */
        .nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            position: relative;
            color: #e2e8f0;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            text-transform: capitalize;
            letter-spacing: 0.3px;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            color: #ffffff;
            background: rgba(99, 102, 241, 0.2);
            border-color: rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.3);
        }

        .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.3) 0%, rgba(139, 92, 246, 0.3) 100%);
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #6366f1, transparent);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            0% {
                opacity: 0.5;
                transform: translateX(-50%) scaleX(0.5);
            }
            100% {
                opacity: 1;
                transform: translateX(-50%) scaleX(1);
            }
        }

        /* User Dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .user-trigger:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
        }

        .user-avatar::before {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .user-name {
            color: #ffffff;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .dropdown-arrow {
            color: #cbd5e1;
            transition: transform 0.3s ease;
            font-size: 0.8rem;
        }

        .user-dropdown.open .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            min-width: 220px;
            background: rgba(30, 30, 46, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow: hidden;
        }

        .user-dropdown.open .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .dropdown-header {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(99, 102, 241, 0.1);
        }

        .dropdown-header h4 {
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .dropdown-header p {
            color: #94a3b8;
            font-size: 0.8rem;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #e2e8f0;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: rgba(99, 102, 241, 0.1);
            color: #ffffff;
            transform: translateX(4px);
        }

        .dropdown-item:last-child {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #f87171;
        }

        .dropdown-item:last-child:hover {
            background: rgba(248, 113, 113, 0.1);
            color: #fca5a5;
        }

        .dropdown-icon {
            font-size: 1rem;
            opacity: 0.7;
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .mobile-menu-btn span {
            width: 20px;
            height: 2px;
            background: #ffffff;
            border-radius: 2px;
            transition: all 0.3s ease;
            margin: 2px 0;
        }

        .mobile-menu-btn.open span:first-child {
            transform: rotate(45deg) translate(4px, 4px);
        }

        .mobile-menu-btn.open span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-btn.open span:last-child {
            transform: rotate(-45deg) translate(4px, -4px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                padding: 1rem;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .nav {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: rgba(30, 30, 46, 0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                gap: 0.5rem;
                padding: 1.5rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .nav.open {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .nav-link {
                width: 100%;
                text-align: center;
                padding: 1rem;
                border-radius: 8px;
                justify-content: center;
            }

            .user-dropdown {
                order: -1;
            }

            .dropdown-menu {
                position: fixed;
                top: 80px;
                right: 1rem;
                left: 1rem;
                width: auto;
            }
        }

        /* Demo Content */
        .demo-section {
            padding: 4rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 100%);
            color: #e2e8f0;
        }

        .demo-section h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .demo-section p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.8;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="#" class="logo">
                <div class="logo-icon">⚡</div>
                <span>AdminPro</span>
            </a>

            <nav class="nav" id="nav">
                <a href="/categories" class="nav-link">Categories</a>
                <a href="/items" class="nav-link">Items</a>
                <a href="/brands" class="nav-link">Brands</a>
                <a href="/dashboard" class="nav-link active">Dashboard</a>
            </nav>

            <div class="user-dropdown" id="userDropdown">
                <div class="user-trigger">
                    <div class="user-avatar">JD</div>
                    <span class="user-name">John Doe</span>
                    <span class="dropdown-arrow">▼</span>
                </div>
                <div class="dropdown-menu">
                    <div class="dropdown-header">
                        <h4>John Doe</h4>
                        <p>john.doe@company.com</p>
                    </div>
                    <a href="/profile" class="dropdown-item">
                        <span class="dropdown-icon">👤</span>
                        View Profile
                    </a>
                    <a href="/settings" class="dropdown-item">
                        <span class="dropdown-icon">⚙️</span>
                        Settings
                    </a>
                    <a href="/logout" class="dropdown-item">
                        <span class="dropdown-icon">🚪</span>
                        Log Out
                    </a>
                </div>
            </div>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Demo content -->
    <div class="demo-section">
        <h1>Professional Dashboard</h1>
        <p>This is your new professional header with smooth flowing animations, user dropdown, and responsive design. The header features continuous background animations and modern glassmorphism effects.</p>
    </div>

    <script>
        // User dropdown toggle
        const userDropdown = document.getElementById('userDropdown');
        const userTrigger = userDropdown.querySelector('.user-trigger');

        userTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('open');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userDropdown.contains(e.target)) {
                userDropdown.classList.remove('open');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const nav = document.getElementById('nav');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('open');
            nav.classList.toggle('open');
        });

        // Navigation link interactions
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Close mobile menu
                mobileMenuBtn.classList.remove('open');
                nav.classList.remove('open');
                
                // Update active state
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
                
                console.log(`Navigating to: ${link.textContent}`);
            });
            
            // Enhanced hover effects
            link.addEventListener('mouseenter', () => {
                if (!link.classList.contains('active')) {
                    link.style.transform = 'translateY(-3px) scale(1.02)';
                }
            });
            
            link.addEventListener('mouseleave', () => {
                if (!link.classList.contains('active')) {
                    link.style.transform = 'translateY(-2px) scale(1)';
                }
            });
        });

        // Dropdown item interactions
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                console.log(`Action: ${item.textContent.trim()}`);
                userDropdown.classList.remove('open');
            });
        });

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</body>
</html>