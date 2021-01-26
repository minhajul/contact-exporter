<?php

namespace Minhajul\ExportGmailContacts\Commands;

use Illuminate\Console\Command;

class ExportGmailContactsCommand extends Command
{
    public $signature = 'export-gmail-contacts';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
