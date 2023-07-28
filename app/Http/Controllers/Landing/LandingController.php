<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{

    public function index()
    {
        $carousel = Carousel::latest()->paginate(12);

        return view('landing.index', compact('carousel'));
    }
    public function about()
    {
        return view('landing.abouts.index');
    }
    public function contact()
    {
        return view('landing.contacts.index');
    }
}
