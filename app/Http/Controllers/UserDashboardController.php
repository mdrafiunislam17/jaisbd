<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //


     public function index ()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('user.index',compact('settings'));
    }
}
