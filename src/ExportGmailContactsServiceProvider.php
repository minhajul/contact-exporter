<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ExportGmailContactsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->configureRoutes();
    }

    public function register()
    {
        $this->app->bind('ExportContacts', function() {
            return new ExportContacts();
        });

//        $this->publishes([
//            __DIR__ . '/../routes/export-gmail-contact.php' => base_path('routes/export-gmail-contact.php'),
//        ], 'export-gmail-contact');
    }

    protected function configureRoutes()
    {
        Route::group([
            'namespace' => 'Minhajul\ExportGmailContacts\Http\Controllers'
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/export-gmail-contact.php');
        });
    }
}
