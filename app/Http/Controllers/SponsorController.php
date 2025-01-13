<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use Inertia\Inertia;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        
        return inertia('Coordinator/Scholarships/Index', ['sponsors' => $sponsors]);
    }

    public function show(Sponsor $sponsor)
    {
        $scholarship = $sponsor->scholarship;

        return Inertia::render('Coordinator/Scholarships/CreateScholarships', [
            'sponsors' => $sponsor,
            'scholarships' => $scholarship,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file',
            'description' => 'required|string',
            'img' => 'required|file',
        ]);

        // dd($request->all());
        $filePath = $request->file('file')->store('sponsor/moa', 'public');
        $logoPath = $request->file('img')->store('sponsor/logo', 'public');

        Sponsor::create([
            'name' => $request->name,
            'moa_file' => $filePath,
            'description' => $request->description,
            'logo' => $logoPath,
        ]);

        return redirect()->route('sponsor.index');
    }
}
