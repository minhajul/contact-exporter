<?php

namespace Minhajul\ExportGmailContacts\Http\Controllers;

use Google_Client;
use Google_Service_Drive;
use Google_Service_People;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;

class ExportGmailContactsController extends Controller
{
    public function handleProviderCallback(Request $request): array
    {
        $user = Socialite::driver('google')
            ->redirectUrl(env('GMAIL_CALLBACK_URL'))
            ->stateless()
            ->user();

        $google_client_token = [
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => $user->expiresIn
        ];

        $client = new Google_Client();
        $client->setApplicationName("Talent Torrent");
        $client->setDeveloperKey(env('GOOGLE_CLIENT_SECRET'));
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setAccessToken(json_encode($google_client_token));

        $service = new Google_Service_People($client);

        $optParams = [
            'requestMask.includeField' => 'person.phone_numbers,person.names,person.email_addresses'
        ];

        $contacts = $service->people_connections->listPeopleConnections(
            'people/me',$optParams
        );

        foreach ($contacts->getConnections() as $connection) {
            $phoneNumber = str_replace(' ', '', $connection->phoneNumbers[0]->value);
        }

        return [];
    }

}
