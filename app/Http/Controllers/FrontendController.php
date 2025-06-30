<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index()
    {
        // Logic to handle the frontend index page

        $sliders = Slider::where('status', 1)
            // ->orderBy('sort', 'asc')
            ->get();
        return view('frontend.index', compact('sliders'));
    }
}
