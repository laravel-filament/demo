<p align="center">
    <img src="https://user-images.githubusercontent.com/41773797/109554629-5f8e2400-7acc-11eb-8c93-a43a370ad311.jpg" alt="Package banner" style="width: 100%; max-width: 800px;" />
</p>


Filament demo with Order, Customer and Product

### [Visit the Filament documentation &rarr;](https://filamentadmin.com/docs)

## Getting Started
```
git clone https://github.com/laravel-filament/demo.git
cd demo
composer install
cp .env.example .env
```
create your database and config the **.env**
```
php artisan migrate
php artisan key:generate
php artisan db:seed
```
You may have to wait 10 minutes or more for seed,

alternative, reduce the number in the **demo/database/seeders/DatabaseSeeder.php**
```
php artisan make:filament-user
```
```
php artisan serve
```
then, you can visit http://localhost/admin/login