<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class OldMessageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web_admin');
    }

    public function index()
    {
        $oldMessage = "Page des anciens messages";
        $messages = Contact::where('is_read', true)->where('is_delete', false)->orderBy('created_at', 'desc')->get();

        return view('admin.pages.old_messages', compact('oldMessage', 'messages'));
    }
}
