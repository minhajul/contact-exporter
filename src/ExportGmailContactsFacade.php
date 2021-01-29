<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Minhajul\ExportGmailContacts\ExportContacts
 */
class ExportGmailContactsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ExportContacts';
    }
}
