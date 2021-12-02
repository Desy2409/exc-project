<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PushDemo;
use App\Models\User;
use Notification;
use Illuminate\Support\Facades\Auth;

class PushController extends Controller
{
    // use Notification;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
 * Send Push Notifications to all users.
 * 
 * @return \Illuminate\Http\Response
 */
public function push(){
    // dd('test');
    Notification::send(User::all(),new PushDemo);
    return redirect()->back();
}

    /**
     * Store the PushSubscription.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        dd(Auth::user());

        $this->validate($request, [
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);

        return response()->json(['success' => true], 200);
    }
}
