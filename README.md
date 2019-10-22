Installation Steps

1. Install PHP
2. Install Composer
3. Install composer packages
```
composer install
```
4. Install MySQL
5. Enable MySQL in php.ini
6. Run this command if MySQL 8.0+ 
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
BY 'password';
```
7. Run Migrations
```
php migrations.php
```
8. Start PHP server
```
php -S 127.0.0.1:8000 -t public
```