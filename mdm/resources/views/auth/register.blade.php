<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Professional Portal</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .registration-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 24px;
            box-shadow: 0 30px 60px rgba(255, 140, 0, 0.2), 0 0 0 1px rgba(255, 140, 0, 0.1);
            overflow: hidden;
            min-height: 600px;
        }

        .image-section {
            background: linear-gradient(rgba(255, 140, 0, 0.5), rgba(255, 140, 0, 0.2)),
                        url('https://images.pexels.com/photos/994605/pexels-photo-994605.jpeg') no-repeat center center;
            background-size: cover;
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

        .image-section > * {
            position: relative;
            z-index: 2;
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

        .form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            position: relative;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
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
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
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

        .form-input, .form-select {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid rgba(255, 140, 0, 0.2);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.02) 0%, rgba(255, 140, 0, 0.05) 100%);
            position: relative;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #FF8C00;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1), 0 4px 12px rgba(255, 140, 0, 0.15);
            transform: translateY(-2px);
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23FF8C00' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
        }

        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .login-link {
            color: #667eea;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.3s ease;
            border-bottom: 1px solid transparent;
        }

        .login-link:hover {
            color: #5a67d8;
            border-bottom-color: #5a67d8;
        }

        .register-button {
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

        .register-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .register-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(255, 140, 0, 0.4);
        }

        .register-button:hover::before {
            left: 100%;
        }

        .register-button:active {
            transform: translateY(-1px);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .registration-container {
                grid-template-columns: 1fr;
                max-width: 400px;
            }
            
            .image-section {
                min-height: 200px;
                padding: 30px;
            }
            
            .welcome-content h2 {
                font-size: 2rem;
            }
            
            .form-section {
                padding: 40px 30px;
            }
            
            .form-footer {
                justify-content: center;
                text-align: center;
            }
        }

        /* Loading animation for inputs */
        .form-input::placeholder {
            color: #a0aec0;
            transition: all 0.3s ease;
        }

        .form-input:focus::placeholder {
            opacity: 0;
            transform: translateX(10px);
        }

        /* Custom scrollbar for select on webkit browsers */
        .form-select::-webkit-scrollbar {
            width: 8px;
        }

        .form-select::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .form-select::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <!-- Image/Welcome Section -->
        <div class="image-section">
            <div class="welcome-content">
                <h2>Welcome</h2>
                <p>Join our professional community and unlock endless possibilities for your career growth.</p>
            </div>
        </div>

        <!-- Registration Form Section -->
        <div class="form-section">
            <div class="form-header">
                <h1>Create Account</h1>
                <p>Please fill in your information to register</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" 
                           class="form-input" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="name"
                           placeholder="Enter your full name">
                    <div class="error-message">
                        <!-- Error messages would appear here -->
                    </div>
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" 
                           class="form-input" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
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
                           autocomplete="new-password"
                           placeholder="Create a secure password">
                    <div class="error-message">
                        <!-- Error messages would appear here -->
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" 
                           class="form-input"
                           type="password"
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password"
                           placeholder="Confirm your password">
                    <div class="error-message">
                        <!-- Error messages would appear here -->
                    </div>
                </div>

                <!-- Register as Admin or User -->
                <div class="form-group">
                    <label for="is_admin" class="form-label">Account Type</label>
                    <select name="is_admin" id="is_admin" class="form-select" required>
                        <option value="0">User Account</option>
                        <option value="1">Admin Account</option>
                    </select>
                </div>

                <div class="form-footer">
                    <a class="login-link" href="{{ route('login') }}">
                        Already have an account?
                    </a>

                    <button type="submit" class="register-button">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>