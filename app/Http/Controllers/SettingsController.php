<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // $settings = Settings::all();
        return inertia('Super_Admin/Settings/Univ_Calendar');
    }


}
