<?php

namespace App\Http\Controllers\ShowcaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $services = "Page nos services";
        $services = Service::all();

        return view('showcase.pages.services', compact('services'));
    }
}
