<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class BasketMessageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web_admin');
    }
    
    public function index()
    {
        $basket = "Page de la corbeille";
        $messages = Contact::where('is_delete', true)->orderBy('updated_at', 'desc')->get();

        return view('admin.pages.basket', compact('basket','messages'));
    }
}
