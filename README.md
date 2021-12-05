# App starter
- copy generated file to fix folder app

# Create View
- Create tables
- create view template (composer require sven/artisan-view --dev - php artisan make:view Name --resource)
- create auto generate view (php artisan generate:crud table id_table)
- create controller from model fillable (composer require mehradsadeghi/laravel-crud-generator - php artisan make:crud NameController --model=Name --validation)

# Database
- create migration from sql (composer require --dev "kitloong/laravel-migrations-generator"
 - php artisan migrate:generate)
- migrate and rollback (php artisan migrate / migrate:rollback)