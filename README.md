## Requirements
- PHP 8.0 and Mysql. or Using Xampp version 8.0 : https://www.apachefriends.org/download.html
- composer
- Nodejs
wait a minute ?. This is laravel project, then why do we need nodejs here ?
because, Im using Laravel + Asset Bundling (Vite) : https://laravel.com/docs/9.x/vite#main-content
you don't need to worry about this vite.  I already configure this project corectly. All you need to just install all those requirements and follow step by step how to run



## Step by step how to run this project
- copy .env.example and rename as .env
- run : composer install
- run : npm install
- run : php artisan migrate
- run : php artisan db:seed
- run : php artisan key:generate
- run : php artisan config:cache
- run : php artisan serve
- open second terminal / bash terminal , run : npm run dev
- open your browser and hit : localhost:8000
- login with email : irfan@gmail.com and password : irfan123