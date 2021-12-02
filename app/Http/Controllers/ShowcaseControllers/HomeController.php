<?php

namespace App\Http\Controllers\ShowcaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $home = "Page d'accueil";
        // $services = Service::all();

        // return view('showcase.pages.home', compact('services'));
        return view('showcase.pages.home', compact('home'));
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
