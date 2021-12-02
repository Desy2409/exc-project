<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client')->except('logOut');;
    }

    public function index()
    {
        $dashboard = "Page du tableau de bord";
        // dd(Auth::guard());
        return view('client.pages.dashboard',compact('dashboard'));
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy()
    {
    }
}
