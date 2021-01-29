<?php

namespace Minhajul\ExportGmailContacts;

use Google_Service_People;
use Laravel\Socialite\Facades\Socialite;

class ExportContacts
{
    public function getContacts()
    {
        $redirectUrl = config('services')['google']['redirect'];

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
