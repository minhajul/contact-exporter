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
            __DIR__.'/../config/contact-exporter.php' => config_path('contact-exporter.php')
        ]);
    }

    public function register()
    {
//        $this->app->bind('ContactExporter', function() {
//            return new ContactExporter();
//        });
    }
}
