<?php

namespace Minhajul\ExportGmailContacts;

use Google_Client;
use Google_Service_Drive;
use Google_Service_People;
use Laravel\Socialite\Facades\Socialite;

class ExportContacts
{
    public function initiate()
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

    public function getContacts(): array
    {
        $googleClientToken = $this->getUserAccessToken(
            $this->initiateSocialite()
        );

        $client = $this->initiateGoogleClient($googleClientToken);

        return $this->initiateServicePeople($client);
    }

    protected function initiateSocialite()
    {
        return Socialite::driver('google')
            ->redirectUrl(env('GMAIL_CALLBACK_URL'))
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
        $client->setApplicationName("Talent Torrent");
        $client->setDeveloperKey(env('GOOGLE_CLIENT_SECRET'));
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