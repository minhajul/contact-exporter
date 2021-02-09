<?php

namespace Minhajul\ContactExporter;

class ContactExporter
{
    public static function initiate($provider)
    {
        $redirectUrl = config('services')[$provider]['redirect'];

        if (empty($redirectUrl)) {
            throw new \Exception("Set your $provider callback url first");
        }

        if ($provider == 'google') {
            return GmailContact::initiate($redirectUrl);
        }

        if ($provider == 'outlook') {
            return OutlookContact::initiate($redirectUrl);
        }

         throw new \Exception("You have not provided valid provider");
    }

    public static function getContacts($provider): array
    {
        if ($provider == 'google') {
            return GmailContact::get();
        }

        if ($provider == 'outlook') {
            return OutlookContact::get();
        }

        throw new \Exception("You have not provided valid provider");
    }
}
