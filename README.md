github-browser
==============

## Installation

```sh
php composer.phar install
```
In `public_html/protected/config/main.php` set database connection parameters:

```php
'db'=>array(
	'connectionString' => 'mysql:host=localhost;dbname=github_browser',
	'emulatePrepare' => true,
	'username' => 'user',
	'password' => 'usbw',
	'charset' => 'utf8',
),
```

Please ensure these directories are writable: `public_html/assets/`,
`public_html/procected/runtime/`.
