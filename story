curl -s https://laravel.build/tuttodo?with=pgsql | bash
./vendor/bin/sail up -d
./vendor/bin/sail composer require laravel/breeze --dev
./vendor/bin/sail artisan breeze:install blade
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan make:model -m Task
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan make:controller TaskController
./vendor/bin/sail artisan make:policy TaskPolicy