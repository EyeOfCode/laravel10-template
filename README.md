# laravel 10 template

### stack

-   php (xampp)
-   mysql (xampp)
-   laravle 10

# models

-   User
-   Blog

# feature

[x] CURD
[x] pagination
[ ] Upload
[x] Auth
[x] Migration
[x] Factories
[x] Seeder
[ ] Sendmail
[x] View
[ ] Relation

# FYL

migration -> model->factories -> seeder -> dbseeder

route (web) -> controller (app/http)(handle service) -> models
route (web) -> controller (app/http)(handle view) -> resources (view)

# cmd

-   php artisan serve (start serve)
-   php artisan make:[controller, seeder, migration, factory, model ] (create module)
-   composer require laravel/ui (install ui auth)
-   php artisan ui bootstrap --auth (init ui auth)(view/home.blade, view/auth, view/layout, controller/Auth, controller/HomeController.php)
-   npm i (install npm)
