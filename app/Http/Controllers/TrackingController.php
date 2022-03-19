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
            $data = [
                'user_id' => $user_id,
                'ip_location' => $array['dns']['geo'],
                'ip' => $array['dns']['ip'],
                'browser' => $request->server('HTTP_USER_AGENT')
            ];

            if (!$this->userExists($data)) {
                $this->emailNotification();
            }

            $tracking = Tracking::create($data);
        }
    }

    public function emailNotification () {
        $user = Auth::user();
        $emailData = [
            'body' => 'There is a login from a new device/browser',
        ];

        Notification::send($user, new NewUser($emailData));
    }

    public function userExists ($data) {
        $tracking = Tracking::where('ip', '=', $data['ip'])
            ->where('browser', '=', $data['browser'])
            ->where('user_id', '=', $data['user_id'])
            ->first();
            
        return isset($tracking);
    }

}