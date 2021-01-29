<?php

namespace Minhajul\ExportGmailContacts\Facades;

use Illuminate\Support\Facades\Facade;

class ExportGmailContactsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ExportContacts';
    }
}
