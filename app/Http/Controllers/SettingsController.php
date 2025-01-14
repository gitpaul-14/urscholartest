<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // $settings = Settings::all();
        return inertia('Coordinator/Settings/Univ_Calendar');
    }


}
