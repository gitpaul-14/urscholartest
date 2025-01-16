<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Requirements;
use App\Models\Scholar;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function index(Scholarship $scholarship)
    {
        $scholars = $scholarship->scholars;

        return Inertia::render('Super_Admin/Scholarships/SendingAccess', [
            'scholarship' => $scholarship,
            'scholars' => $scholars,
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'requirements' => 'required|array',
            'application' => 'required|date',
            'deadline' => 'required|date'
        ]);
        
        // dd($request);
        // Get all scholars
        $scholars = Scholar::all();

        // Create the same requirement for all scholars
        foreach ($scholars as $scholar) {
            Requirements::create([
                'scholar_id' => $scholar->id,
                'requirements' => $request['requirements'],
                'application_start' => $request['application'],
                'deadline' => $request['deadline'],
            ]);
        }

        return redirect()->route('sponsor.index');
    }
}
