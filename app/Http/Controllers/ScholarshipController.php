<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Scholarship;
use App\Models\Scholar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        return inertia('Coordinator/Scholarships/Index', ['scholarships' => $scholarships]);
    }


    public function show(Scholarship $scholarship)
    {
        $scholars = $scholarship->scholars;

        return Inertia::render('Coordinator/Scholarships/Scholars', [
            'scholarship' => $scholarship,
            'scholars' => $scholars,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        Scholarship::create($request->all());

        return redirect()->route('scholarships.index');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // dd($request);

        $scholarship = Scholarship::findOrFail($id);
        $scholarship->update($request->all());

        return redirect()->route('scholarships.index');
    }
    // public function destroy($id)
    // {
    //     try {
    //         $scholarship = Scholarship::findOrFail($id); // Find the scholarship by ID
    //         $scholarship->delete(); // Delete the scholarship

    //         return response()->json(['message' => 'Scholarship deleted successfully']);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Failed to delete scholarship', 'details' => $e->getMessage()], 500);
    //     }
    // }
}


