<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAboutUsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web_admin');
    }

    public function index()
    {
        $adminAboutUs = "Page admin à propos de nous";
        return view('admin.pages.about_us', compact('adminAboutUs'));
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
