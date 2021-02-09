<?php

namespace Minhajul\ContactExporter;

use Illuminate\Support\ServiceProvider;

class ContactExporterServiceProvider extends ServiceProvider
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
        $this->app->bind('ContactExporter', function() {
            return new ContactExporter();
        });
    }
}
