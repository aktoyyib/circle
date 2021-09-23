## Blood Pressure Management Application
---------------------------------------------------------------------------

## Below are the steps to gett he application running

---------------------------------------------------------------------------

##First clone or download this repository

    git clone https://github.com/aRhez0903/Laravel-8-Livewire-CoreUI-Datatables.git

	After clone or download this repository, next step is install all dependency required by laravel and laravel-mix.

	# install composer-dependency & npm package & build dev
	composer install && npm install && npm run dev

	Next Step
	Before we start web server make sure we already generate app key, configure .env file and do migration.

	# create copy of .env
	cp .env.example .env

	# create laravel key
	php artisan key:generate

	# laravel migrate & seed some data
	php artisan migrate:fresh --seed

	Default User
	Login : tizzy@aktoyyib.com Pass : password