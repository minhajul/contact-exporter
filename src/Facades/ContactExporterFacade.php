<?php

namespace Minhajul\ContactExporter\Facades;

use Illuminate\Support\Facades\Facade;

class ContactExporterFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ExportContacts';
    }
}
