<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index()
    {
        return Inertia::render('Super_Admin/Settings/Univ_Calendar');
    }


}
