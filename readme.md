# Mini Twitter

## Requirements
------------
- PHP 5.3.3+, MySQL.
- Composer (https://getcomposer.org/download/)

## Installation
------------
### 1. Install dependencies via composer:
    Run composer command in "twitter" folder, assume componse install in /usr/local/bin
    shell> /usr/local/bin/composer install

### 2. Change the folder permissions for the storage folder:
    shell> chmod 777 -R app/storage

### 3. Configure database
    shell> vim app/config/database.php

```php
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'twitter',
			'username'  => 'root',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
```

### 4. Initilaize application
    shell> php artisan migrate:install
    shell> php artisan migrate
    shell> php artisan db:seed

### 5. Run application
#### Option 1 (PHP server)
    shell> php artisan serve
Open http://localhost:8000 in browser

#### Option 2 (Apache)
    <VirtualHost>
        ServerName www.example.com
        DocumentRoot "/var/sites/twitter/public"
    </VirtualHost>

### 6. Some user for test
    Users: peter,benjamin,johan,mason,jacob,madison,jackson,amelia,lily,samuel
    Password: 123456
