<?php

namespace Minhajul\ContactExporter;

use Google_Client;
use Google_Service_Drive;
use Google_Service_People;
use Laravel\Socialite\Facades\Socialite;

class GmailContact
{
    public static function initiate($redirectUrl)
    {
        return Socialite::driver('google')
            ->redirectUrl($redirectUrl)
            ->scopes(['openid', 'profile', 'email', Google_Service_People::CONTACTS_READONLY])
            ->stateless()
            ->redirect();
    }

    public static function get(): array
    {
        $googleClientToken = (new self)->getUserAccessToken(
            (new self)->initiateSocialite()
        );

        $client = (new self)->initiateGoogleClient($googleClientToken);

        return (new self)->initiateServicePeople($client);
    }

    protected function initiateSocialite()
    {
        return Socialite::driver('google')
            ->redirectUrl(config('exportGmailContacts.callback_url'))
            ->stateless()
            ->user();
    }

    protected function getUserAccessToken($user): array
    {
        return [
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => $user->expiresIn
        ];
    }

    protected function initiateGoogleClient($googleClientToken): Google_Client
    {
        $client = new Google_Client();
        $client->setApplicationName(config('exportGmailContacts.app_name'));
        $client->setDeveloperKey(config('exportGmailContacts.GOOGLE_CLIENT_SECRET'));
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setAccessToken(json_encode($googleClientToken));

        return $client;
    }

    protected function initiateServicePeople($client): array
    {
        $service = new Google_Service_People($client);

        return $this->getConnections($service);
    }

    protected function getConnections($service): array
    {
        $optParams = [
            'requestMask.includeField' => 'person.phone_numbers,person.names,person.email_addresses'
        ];

        $contacts = $service->people_connections->listPeopleConnections(
            'people/me', $optParams
        );

        $array = [];
        foreach ($contacts->getConnections() as $connection) {
            $phoneNumber = str_replace(' ', '', $connection->phoneNumbers[0]->value);

            array_push($phoneNumber, $array);
        }

        return $array;
    }
}
