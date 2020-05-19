Laravel Static Asset Version
=====

Installation
------------

Install using composer:

Add to composer.json
```bash
"require": {
...
"mhardz/laravel-static-asset-version": "^1.0.0"
...
},
...
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/mhardz-17/laravel-static-asset-version"
    }
]
```

Laravel (optional)
------------------

Add the service provider in `config/app.php`:

```php
Mhardz\LaravelStaticAssetVersion\LaravelStaticAssetVersionServiceProvider::class,
```


Basic Usage
-----------

Refresh version by running this on command line

```php
php artisan asset-version:refresh
```

Use the helper to generate asset url with version like
```php
    asset_with_version('url');
```



## License

Laravel Static Version is licensed under [The MIT License (MIT)](LICENSE).
