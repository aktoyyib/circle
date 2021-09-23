## Blood Pressure Management Application
---------------------------------------------------------------------------

## Below are the steps to get the application running

---------------------------------------------------------------------------

	#First clone or download this repository

    git clone git@github.com:aktoyyib/circle.git

	After clone or download this repository, next step is install all dependency required by laravel and laravel-mix.

	# install composer-dependency & npm package & build dev
	composer update && npm install && npm run dev

	#Supports Php version 7.3 >

	Next Step
	Before you start web server make sure you already generate app key, configure .env file and setup your database.

	# create copy of .env
	cp .env.example .env

	# create laravel key
	php artisan key:generate

	# laravel migrate & seed some data
	php artisan migrate:fresh --seed

	Default User
	Login : tizzy@aktoyyib.com Pass : password