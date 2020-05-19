<?php

namespace Mhardz\LaravelStaticAssetVersion;


use Illuminate\Support\ServiceProvider;
use Mhardz\LaravelStaticAssetVersion\Console\Commands\UpdateAssetVersion;

class LaravelStaticAssetVersionServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UpdateAssetVersion::class
            ]);
        }
    }
}
