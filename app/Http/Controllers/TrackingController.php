<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\NewUser;

class TrackingController extends Controller
{
    public function create ($request) {
        $user_id = Auth::id();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', env('IP_API_URL'));
        if ($response->getBody()) {
            $array = json_decode($response->getBody()->getContents(), true);
            $input = [
                'user_id' => $user_id,
                'ip_location' => $array['dns']['geo'],
                'ip' => $array['dns']['ip'],
                'browser' => $request->server('HTTP_USER_AGENT')
            ];

            $tracking = Tracking::create($input);
            $this->emailNotification();
        }
    }

    public function emailNotification () {
        $user = Auth::user();
        $emailData = [
            'body' => 'A new User has loged in to your application',
        ];

        Notification::send($user, new NewUser($emailData));
    }

}