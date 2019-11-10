# Artist Den

This project was created to give artists an easy access to create their own album-site. 

## Installation

The project requires:
1. PHP 7.2
2. MySQL 5.7

### Install with composer:
Install all requirements:
```
composer install
```
Apply migrations:
```
yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
yii migrate/up --migrationPath=@yii/rbac/migrations
yii migrate
```
### Docker-compose:

TODO!