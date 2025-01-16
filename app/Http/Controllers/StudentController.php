<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Requirements;
use App\Models\User;
use App\Models\Scholar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function dashboard() {
        return Inertia::render('Student/Dashboard/Feed');
    }

    public function scholarship() {
        return Inertia::render('Student/Scholarship');
    }

    public function application(User $user) {


        // $scholars = $user->scholars;
        $scholars = Scholar::where('email', Auth::user()->email)->with('scholarship')->get();

        $scholarshipIds = $scholars->pluck('scholarship_id')->unique();
        $scholarships = Scholarship::whereIn('id', $scholarshipIds)->with('requirements')->get();

        $requirements = Requirements::where('scholar_id', $scholars->first()->id)->get();

        return Inertia::render('Student/Application/Application', [
            'scholars' => $scholars,
            'scholarships' => $scholarships,
            'requirements' => $requirements
        ]);
    }
}
