<?php

namespace Minhajul\ContactExporter;

use Google_Service_People;
use Laravel\Socialite\Facades\Socialite;

class OutlookContact
{
    public static function initiate($redirectUrl)
    {
        return Socialite::driver('outlook')
            ->redirectUrl($redirectUrl)
            ->scopes(['openid', 'profile', 'email', Google_Service_People::CONTACTS_READONLY])
            ->stateless()
            ->redirect();
    }

    public static function get(): array
    {
        return [];
    }
}
