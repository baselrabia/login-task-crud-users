# login-task-crud-users

## Setting up


### Requirements
- [PHP >= 7.2](http://php.net/)
- [Composer](https://getcomposer.org/)
- [Xampp](https://www.apachefriends.org/)
- [Git](https://git-scm.com/)


### Clone GitHub repo for this project locally

`git clone https://github.com/baselrabia/login-task-crud-users.git`

- `cd login-task-crud-users`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`

## Linking Mysql Database to the Project

- Open your local `PhpMyAdmin` 
- create new database for the application 
- edit the configration of the database in the `.env` file 
- Run the command line for making the migration of the database -> `php artisan migrate`

## starting the application 

now everthing is almost done just one step more to start your App
-  Run this command line forserveing the App to your localhost ->  `php artisan serve` 
