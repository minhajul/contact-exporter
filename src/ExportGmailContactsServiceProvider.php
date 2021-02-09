<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\ServiceProvider;

class ExportGmailContactsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/exportGmailContacts.php' => config_path('exportGmailContacts.php')
        ]);
    }

    public function register()
    {
        $this->app->bind('ExportContacts', function() {
            return new ExportContacts();
        });
    }
}
