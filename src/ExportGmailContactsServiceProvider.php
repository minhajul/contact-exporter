<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\ServiceProvider;

class ExportGmailContactsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/export-gmail-contacts.php' => config_path('courier.php'),
        ]);
    }
}
