(1) routes inside \routes\web.php

(2) views inside \resources\views

(3) controllers inside \app\Http\Controllers

https://laravel.com/docs/5.6/blade
https://laravel.com/docs/5.6/blade
https://laravel.com/docs/5.6/blade
https://laravel.com/docs/5.6/blade
https://laravel.com/docs/5.6/blade

(4) 
'mysql' => [
            'driver'    => 'mysql',
            ...
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
            ],
        ],

inside bootstrap/cache/config.php
inside .env
otherwise mysql exception
see .pdf file help stackoverflow file

(5)
php artisan key:generate
see new api-key inside .env
php artisan cache:clear
see new api-key is same inside .env and bootstrap/cache/config.php
then make sure config.php is inside folder bootstrap/cache
because you did a laravel install on windows and when sftp to cloudsite the directory
permissions were not ok for /storage and /bootstrap/cache
and then you got the"whoops laravel error" on home page of laravel app.

(6)
git add .
git commit -m "put message here"
git push <url> <branch>



