<?php

namespace Minhajul\ExportGmailContacts;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Minhajul\ExportGmailContacts\ExportGmailContacts
 */
class ExportGmailContactsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'export-gmail-contacts';
    }
}
