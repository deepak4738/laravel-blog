# Laravel Blog

A simple blog with user registration, login an comments for demonstration purpose. Based on Laravel 8.0

## Requirements

- Laravel 8.0
- PHP >= 8.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
## Installation

```
git clone https://github.com/deepak4738/laravel-blog.git
cd larave-blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```