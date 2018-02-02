<?php 

#laravel >>> php artisan key:generate

#'prefix' => env('API_PREFIX', 'api'),

# SETUP 
composer global require "laravel/installer" --no-interaction -vvv
	/** IF >>
	 * symfony/console suggests installing symfony/event-dispatcher ()
	 * symfony/console suggests installing symfony/lock ()
	 * symfony/console suggests installing psr/log (For using the console logger)
	 * guzzlehttp/guzzle suggests installing psr/log (Required for using the Log middleware)
	 */
composer global require symfony/event-dispatcher symfony/lock psr/log --no-interaction

composer global config process-timeout 3000

composer create-project --prefer-dist laravel/laravel api --no-interaction -vvv (--no-interaction is for that annoying "please create a GitHub OAuth token to go over the API rate limit")

#laravel >>>  @php -r "file_exists('.env') || copy('.env.example', '.env');"

php artisan -V

// mozemo i da ulazimo u docker image sa --user=1000 da izbegnemo setovanje `root` ownershipa na  ali nece raditi sve komande iz composer-a!!
sudo chown $USER:$GROUP api/ -R  //treba da bude u sustini 1000:1000 unutar php-docker container-a.

//permisije za  storage/ i bootstrap/cache/
chmod -R 0777 storage/
chmod -R 0777 bootstrap/cache/

// unutar naseg .env fajla moramo definisati sledece varijable
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

//zatim 
php artisan migrate


// config/app.php sadrzi dodatne opcije, tipa 'timezone' and 'locale'




