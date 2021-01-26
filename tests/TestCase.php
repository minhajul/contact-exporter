<?php

namespace Minhajul\ExportGmailContacts\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Minhajul\ExportGmailContacts\ExportGmailContactsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

//        Factory::guessFactoryNamesUsing(
//            fn (string $modelName) => 'Minhajul\\ExportGmailContacts\\Database\\Factories\\'.class_basename($modelName).'Factory'
//        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            ExportGmailContactsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_export_gmail_contacts_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
