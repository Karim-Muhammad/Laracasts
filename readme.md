composer autoload helped us to avoid writing
```php
    spl_autoload_register(function ($class) {
        $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });
```

we just write our top-level namespace and composer will do the rest
```php
    require __DIR__ . '/vendor/autoload.php';
```

```json
    "autoload": {
        "psr-4": {
            "Core\\": "Core/",
            "Http\\": "Http/"
        }
    }
```


### 3.2.1. Composer install
```bash
    composer install
```

will create vendor folder and autoload.php file

### 3.2.2. Composer dump-autoload
```bash
    composer dump-autoload
```

this will update files `autoload.php` and `autoload_psr4.php`