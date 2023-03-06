HRM[Home Rent Management]
==========================================

# Description
  Easy & hassle free 'Home Rent Management' web application.

# Installation and use
### HRM is build using Laravel 5.3
```
$ git clone https://github.com/usmanalee/Home-Rent-Management.git
```
```
$ cd Home-Rent-Management
```
```
$ mv .env.example .env
```
**Change configuration in .env according your need and create Database**
```
$ composer install
```
```
$ php artisan migrate
```
```
$ php artisan db:seed
```
```
$ php artisan storage:link
```
**Give write permission to storage and bootstrap/cache directory**

```
$ php artisan serve
```
**http://localhost:8000** \
USER: admin@example.com \
PASS: admin123