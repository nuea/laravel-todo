# Laravel Todo API
## Set up

- `git clone https://github.com/nuea/laravel-todo.git`
- `cd laravel-todo`
- `docker-compose up`

## Document 
- [Swagger](https://github.com/nuea/laravel-todo/blob/master/swagger.json) (.json)
- [Swagger](https://github.com/nuea/laravel-todo/blob/master/swagger.yaml) (.yaml)

## Resource
 - [Routes](https://github.com/nuea/laravel-todo/blob/master/routes/api.php)
 - [Controller](https://github.com/nuea/laravel-todo/blob/master/app/Http/Controllers/TaskController.php)
 - [Database Migration](https://github.com/nuea/laravel-todo/blob/master/database/migrations/2018_10_07_004514_create_todo_table.php)

## Test
 - [View all task](https://github.com/nuea/laravel-todo/blob/master/tests/Feature/viewAllTest.php)
 - [View single task](https://github.com/nuea/laravel-todo/blob/master/tests/Feature/viewSingleTest.php) 
 - [Add a new task](https://github.com/nuea/laravel-todo/blob/master/tests/Feature/addTest.php)
 - [Edit task](https://github.com/nuea/laravel-todo/blob/master/tests/Feature/editTest.php)
 - [Set status task](https://github.com/nuea/laravel-todo/blob/master/tests/Feature/setStatusTest.php)
 - [Delete task](https://github.com/nuea/laravel-todo/blob/master/tests/Feature/deleteTest.php)
 
## How to test in Laravel (in local)
### If you want to test
 1. install composer
 2. `cd laravel-todo`
 3. `composer install`
 4. `vendor/bin/phpunit.bat`

