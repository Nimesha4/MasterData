<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Project Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8fafc;
            color: #334155;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .content {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        
        .footer {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: #cbd5e1;
            padding: 3rem 0 1rem;
            margin-top: auto;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-section {
            margin-bottom: 1.5rem;
        }
        
        .footer-heading {
            color: #ffffff;
            font-size: 1.5rem;
            margin-bottom: 1.2rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-heading:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 3px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: #3b82f6;
            transform: translateX(5px);
        }
        
        .footer-links i {
            margin-right: 8px;
            color: #8b5cf6;
        }
        
        .footer-text {
            margin-bottom: 1rem;
            line-height: 1.8;
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #334155;
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transform: translateY(-3px);
        }
        
        .footer-subscribe {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        
        .footer-input {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background: #334155;
            color: white;
        }
        
        .footer-input::placeholder {
            color: #94a3b8;
        }
        
        .footer-button {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .footer-button:hover {
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            transform: translateY(-2px);
        }
        
        .footer-bottom {
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 2rem;
            border-top: 1px solid #334155;
        }
        
        .footer-bottom-text {
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        .laravel-brand {
            color: #ff2d20;
            font-weight: bold;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-heading:after {
                left: 50%;
                transform: translateX(-25px);
            }
            
            .footer-subscribe {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3 class="footer-heading">About Us</h3>
                <p class="footer-text">Our system allows you to efficiently manage Categories, Brands, and Items — making it easier to organize products, maintain consistency, and streamline inventory operations.</p>
                <div class="footer-social">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-heading">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Items</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Categories</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Brands</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Dashboard</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-heading">Contact Info</h3>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> 123 Colombo Street, Dev City</li>
                    <li><i class="fas fa-phone"></i> +94 77 774 1254</li>
                    <li><i class="fas fa-envelope"></i> support@laravelapp.com</li>
                    <li><i class="fas fa-clock"></i> Mon-Fri: 9:00 AM - 5:00 PM</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-heading">Newsletter</h3>
                <p class="footer-text">Subscribe to our newsletter for the latest updates and features.</p>
                <div class="footer-subscribe">
                    <input type="email" class="footer-input" placeholder="Your Email">
                    <button class="footer-button">Subscribe</button>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="footer-bottom-text">&copy; 2023 <span class="laravel-brand">Laravel</span> Application. All rights reserved. | Made with <i class="fas fa-heart" style="color: #ff2d20;"></i> and Laravel</p>
        </div>
    </footer>
</body>
</html>