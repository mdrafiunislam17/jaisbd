

##  Laravel Install
composer create-project "laravel/laravel:^10.0" jaisbd.com

## Login
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev


## AssignRole
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"


## Step-by-Step DataTables Integration
composer require yajra/laravel-datatables-oracle:"^10.6"

php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"





