<?php

namespace Minhajul\ExportGmailContacts;

use Google_Service_People;
use Laravel\Socialite\Facades\Socialite;

class ExportGmailContacts
{
    public function getContacts()
    {
        $redirectUrl = config('exportGmailContacts.google_callback_url');

        if (empty($redirectUrl)) {
            throw new \Exception('Set your google callback url first.');
        }

        return Socialite::driver('google')
            ->redirectUrl($redirectUrl)
            ->scopes(['openid', 'profile', 'email', Google_Service_People::CONTACTS_READONLY])
            ->stateless()
            ->redirect();
    }
}
