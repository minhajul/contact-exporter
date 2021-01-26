<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\ServiceProvider;

class ExportGmailContactsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/export-gmail-contacts.php' => config_path('export-gmail-contacts.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/export-gmail-contacts.php', 'export-gmail-contacts'
        );
    }
}
