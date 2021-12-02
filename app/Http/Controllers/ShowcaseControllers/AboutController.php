<?php

namespace App\Http\Controllers\ShowcaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $aboutUs = "Paga à propos de nous";
        // $services = Service::all();

        // return view('showcase.pages.about_us', compact('services'));
        return view('showcase.pages.about_us', compact('aboutUs'));
    }
}
