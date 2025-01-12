<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return inertia('Coordinator/Scholarships/Index', ['sponsors' => $sponsors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file',
            'description' => 'required|string',
        ]);

        // dd($request->all());
        $filePath = $request->file('file')->store('uploads', 'public');

        Sponsor::create([
            'name' => $request->name,
            'moa_file' => $filePath,
            'description' => $request->description,
        ]);

        return redirect()->route('sponsor.index');
    }
}
