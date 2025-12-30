<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/izzeran96/loginAssigmentIzz/actions"><img src="https://img.shields.io/github/workflow/status/izzeran96/loginAssigmentIzz/Laravel" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-brightgreen" alt="License"></a>
</p>

---

# Login Assignment Izz

This is a **Laravel 10 assignment project** for login, registration, dashboard, user management, and activity tracking.  

### Features
- User login and registration
- Admin dashboard
- User creation, edit, and delete
- User activity tracking
- Online/offline status tracking
- Seeder for test users (`test001` → `test100`)

---

## Installation

```bash
git clone git@github.com:izzeran96/loginAssigmentIzz.git
cd loginAssigmentIzz
composer install
cp .env.example .env
php artisan key:generate
