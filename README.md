Instalation:
============================================================

    git clone https://github.com/rezaarief1411/library.git

    cd into project directory  

    composer install 

    composer require livewire/livewire

    composer create-project laravel/laravel library

    php artisan install:api

Configuration:
============================================================
* rename *.env.example* file to *.env*
* setup database connection on DB_*
* for production change 
`APP_DEBUG to false` and `APP_ENV to production`
* run command `php artisan key:generate`


How To Run:
============================================================
* run command
```
php artisan serve
```
