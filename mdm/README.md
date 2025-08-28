<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.




# Master Data Management (MDM)

A Laravel-based application for managing brands, categories, and items with user authentication and role-based access control.

## Features

- **User Authentication**
  - Login and Registration
  - Admin and User roles
  - Profile management

- **Brand Management**
  - Create, Read, Update, Delete (CRUD)
  - Code and name management
  - Active/Inactive status
  - User-specific brand views
  - Admin access to all brands

- **Category Management**
  - CRUD operations
  - Code and name management
  - Active/Inactive status
  - User-specific category views
  - Admin access to all categories

- **Item Management**
  - CRUD operations
  - Link items to brands and categories
  - File attachment support
  - Active/Inactive status
  - User-specific item views
  - Admin access to all items

## Tech Stack

- PHP 8.2.12
- Laravel 12.26.3
- MySQL Database
- Blade Templates
- TailwindCSS

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd mdm
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**
   - Update `.env` with your database credentials
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mdm_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the server**
   ```bash
   php artisan serve
   ```

## Database Structure

### Users Table
- id (bigint, unsigned)
- name (varchar)
- email (varchar, unique)
- password (varchar)
- is_admin (tinyint)
- created_at (timestamp)
- updated_at (timestamp)

### Brands Table
- id (bigint, unsigned)
- user_id (bigint, unsigned, foreign key)
- code (varchar, unique)
- name (varchar)
- status (enum: Active/Inactive)
- created_at (timestamp)
- updated_at (timestamp)

### Categories Table
- id (bigint, unsigned)
- user_id (bigint, unsigned, foreign key)
- code (varchar, unique)
- name (varchar)
- status (enum: Active/Inactive)
- created_at (timestamp)
- updated_at (timestamp)

### Items Table
- id (bigint, unsigned)
- user_id (bigint, unsigned, foreign key)
- brand_id (bigint, unsigned, foreign key)
- category_id (bigint, unsigned, foreign key)
- code (varchar, unique)
- name (varchar)
- attachment (varchar, nullable)
- status (enum: Active/Inactive)
- created_at (timestamp)
- updated_at (timestamp)

## Role-Based Access

### Admin Users
- Can view all users' data
- Full CRUD access to all brands, categories, and items
- Can manage user accounts

### Regular Users
- Can only view and manage their own data
- CRUD access limited to their own brands, categories, and items
- Can update their profile

## Routes

- `/` - Welcome page
- `/register` - User registration
- `/login` - User login
- `/dashboard` - Main dashboard
- `/brands` - Brand management
- `/categories` - Category management
- `/items` - Item management
- `/profile` - User profile management

## Security

- Authentication required for all management features
- CSRF protection
- Form validation
- Role-based access control
- Secure password hashing

## Author

Nimesha Jayawickrama