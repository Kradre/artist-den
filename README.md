# Artist Den

This project was created to give artists an easy access to create their own album-site. 

TODO list:
1. Categories and sub-categories for albums
2. Subscription system
3. Little Dens for other artists on site
4. Games folder
5. Ad board
6. Blacklist board
7. Server controls (Full management panel)
8. Configurable RBAC - 10%
9. Cluster ability
10. Custom CSS styles for different artists
11. Auto-analyzing for image censor (restriction for public showing)
12. Import from other sites

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
yii migrate --migrationPath=@yii/rbac/migrations
yii migrate
```
### Docker-compose:

TODO!