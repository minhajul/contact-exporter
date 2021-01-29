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

        $this->publishes([
            __DIR__ . '/../config/exportGmailContacts.php' => config_path('exportGmailContacts.php'),
        ], 'exportGmailContacts');

        $this->configureRoutes();
    }

    public function register()
    {
//        $this->app->singleton(ExportGmailContacts::class, function (){
//            return new ExportGmailContacts();
//        });
//
//        $this->app->alias(ExportGmailContacts::class, 'ExportGmailContacts');


        $this->mergeConfigFrom(
            __DIR__ . '/../config/exportGmailContacts.php', 'exportGmailContacts'
        );

        $this->publishes([
            __DIR__ . '/../routes/export-gmail-contact.php' => base_path('routes/export-gmail-contact.php'),
        ], 'export-gmail-contact');
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
