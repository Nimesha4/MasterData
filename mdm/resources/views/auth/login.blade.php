<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Professional Portal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 5%, #f8fafc 100%);
            min-height: 100vh;
            display: block;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
           
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTSA0MCAwIEwgMCAwIDAgNDAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIgc3Ryb2tlLXdpZHRoPSIxIi8+Cjwvc3ZnPg==');
            background-size: 40px 40px;
            opacity: 0.3;
            z-index: 1;
        }

        .login-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 24px;
            box-shadow: 0 30px 60px rgba(255, 140, 0, 0.2), 0 0 0 1px rgba(255, 140, 0, 0.1);
            overflow: hidden;
            min-height: 600px;
            position: relative;
            z-index: 10;
            backdrop-filter: blur(10px);
            margin: auto; 
            top: 0; bottom: 0; 
        }

        .image-section {
            background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.9) 50%, rgba(255, 140, 0, 0.8) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 50px 40px;
            position: relative;
            overflow: hidden;
        }

        .image-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: float 8s ease-in-out infinite;
        }

        .image-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjIpIi8+Cjwvc3ZnPg==');
            background-size: 60px 60px;
            opacity: 0.3;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, -10px) rotate(1deg); }
            50% { transform: translate(-5px, 5px) rotate(-1deg); }
            75% { transform: translate(-10px, -5px) rotate(1deg); }
        }

        .image-section > * {
            position: relative;
            z-index: 3;
        }

        .welcome-content h2 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, #ffffff, rgba(255, 255, 255, 0.8));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .welcome-content p {
            font-size: 1.2rem;
            opacity: 0.95;
            line-height: 1.6;
            max-width: 320px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-weight: 400;
        }

        .welcome-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 20px rgba(255, 255, 255, 0.3); }
            50% { transform: scale(1.05); box-shadow: 0 0 30px rgba(255, 255, 255, 0.5); }
        }

        .form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            position: relative;
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #FF8C00, rgba(255, 140, 0, 0.3));
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-header h1 {
            color: #1a202c;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            position: relative;
        }

        .form-header h1::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #FF8C00, rgba(255, 140, 0, 0.3));
            border-radius: 2px;
        }

        .form-header p {
            color: #718096;
            font-size: 1rem;
            font-weight: 500;
        }

        .session-status {
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.1) 0%, rgba(255, 140, 0, 0.05) 100%);
            color: #FF8C00;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 140, 0, 0.2);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.8rem;
            color: #FF8C00;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid rgba(255, 140, 0, 0.2);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.02) 0%, rgba(255, 140, 0, 0.05) 100%);
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: #FF8C00;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1), 0 4px 12px rgba(255, 140, 0, 0.15);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: rgba(255, 140, 0, 0.5);
            transition: all 0.3s ease;
        }

        .form-input:focus::placeholder {
            opacity: 0;
            transform: translateX(10px);
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .checkbox-input {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 140, 0, 0.3);
            border-radius: 6px;
            margin-right: 15px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            appearance: none;
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 140, 0, 0.1) 100%);
            position: relative;
        }

        .checkbox-input:checked {
            background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 100%);
            border-color: #FF8C00;
            transform: scale(1.1);
        }

        .checkbox-input:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-label {
            color: #4a5568;
            font-size: 0.9rem;
            cursor: pointer;
            user-select: none;
            font-weight: 500;
        }

        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.8rem;
            font-weight: 500;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .forgot-password-link {
            color: #FF8C00;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
            padding-bottom: 2px;
        }

        .forgot-password-link:hover {
            color: rgba(255, 140, 0, 0.8);
            border-bottom-color: rgba(255, 140, 0, 0.8);
            transform: translateY(-1px);
        }

        .login-button {
            background: linear-gradient(135deg, #FF8C00 0%, rgba(255, 140, 0, 0.8) 100%);
            color: white;
            border: none;
            padding: 16px 40px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 20px rgba(255, 140, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(255, 140, 0, 0.4);
        }

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:active {
            transform: translateY(-1px);
        }

        /* Decorative elements */
        .decorative-circles {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 8px;
        }

        .circle {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 140, 0, 0.2);
            animation: breathe 2s ease-in-out infinite;
        }

        .circle:nth-child(2) {
            animation-delay: 0.3s;
            background: rgba(255, 140, 0, 0.3);
        }

        .circle:nth-child(3) {
            animation-delay: 0.6s;
            background: rgba(255, 140, 0, 0.4);
        }

        @keyframes breathe {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.2); opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 450px;
                border-radius: 20px;
            }
            
            .image-section {
                min-height: 250px;
                padding: 40px 30px;
            }
            
            .welcome-content h2 {
                font-size: 2.2rem;
            }
            
            .form-section {
                padding: 50px 30px;
            }
            
            .form-footer {
                justify-content: center;
                text-align: center;
                flex-direction: column;
            }

            .login-button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .login-container {
                max-width: 100%;
                margin: 0;
            }

            .form-section {
                padding: 40px 20px;
            }

            .image-section {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="decorative-circles">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <div class="login-container">
        <!-- Image/Welcome Section -->
        <div class="image-section">
            <div class="welcome-icon">
                🔐
            </div>
            <div class="welcome-content">
                <h2>Welcome Back</h2>
                <p>Sign in to access your professional dashboard and continue your journey with us.</p>
            </div>
        </div>

        <!-- Login Form Section -->
        <div class="form-section">
            <div class="form-header">
                <h1>Sign In</h1>
                <p>Please enter your credentials to continue</p>
            </div>

            <!-- Session Status -->
            <div class="session-status" style="display: none;">
                <!-- Session status messages would appear here -->
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" 
                           class="form-input" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           placeholder="Enter your email address">
                    <div class="error-message">
                        <!-- Error messages would appear here -->
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" 
                           class="form-input"
                           type="password"
                           name="password"
                           required 
                           autocomplete="current-password"
                           placeholder="Enter your password">
                    <div class="error-message">
                        <!-- Error messages would appear here -->
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="checkbox-container">
                    <input id="remember_me" 
                           type="checkbox" 
                           class="checkbox-input" 
                           name="remember">
                    <label for="remember_me" class="checkbox-label">
                        Remember me
                    </label>
                </div>

                <div class="form-footer">
                    <a class="forgot-password-link" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>

                    <button type="submit" class="login-button">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>