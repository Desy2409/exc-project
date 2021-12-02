<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadRegisterFromToken(Request $request)
    {
        $sender = User::where('token', $request->token)->first();

        if ($sender != null && $sender->token != null && $sender->token == $request->token) {
            return view('auth.register_admin');
        } else {
            return view('admin.pages.error-404');
        }
    }

    public function contactNotification(){
        return auth()->user()->unreadNotifications;
    }
}
