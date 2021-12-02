<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logOut');;
    }

    public function index()
    {
        $dashboard = "Page du tableau de bord";
        return view('admin.pages.dashboard',compact('dashboard'));
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
