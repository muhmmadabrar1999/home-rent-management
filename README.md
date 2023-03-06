HRM[House Rent Management]
==========================================

# Description
  Easy & hassle free 'House Rent Management' web application.

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
USER: admin@hrm.com \
PASS: demo123


# Screenshot
<img src="screenshots/1.png">
<img src="screenshots/2.png">
<img src="screenshots/3.png">
<img src="screenshots/4.png">
<img src="screenshots/6.png">
<img src="screenshots/7.png">


# License
HRM is open-sourced software licensed under the AGPL-3.0 license. Frameworks and libraries has it own licensed

Enjoy :)
