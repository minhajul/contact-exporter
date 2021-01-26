<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\ServiceProvider;

class ExportGmailContactsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/exportGmailContacts.php' => config_path('exportGmailContacts.php'),
            ], 'config');

        }

        $this->loadRoutesFrom(__DIR__.'/../routes/package.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/exportGmailContacts.php', 'exportGmailContacts'
        );
    }
}
