laravel new simple


Starter kit: None
Blade


then:

cd ./simple
npm i
composer install


paste env.example contents into .env
php artisan key:generate


create a sqlite with:
New-Item database\database.sqlite -ItemType File
...then
php artisan migrate

composer run dev
(http://localhost:5173/ usa vite)


open other terminal and:
php artisan serve
(http://127.0.0.1:8000)