<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Scholar;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class ScholarController extends Controller
{
    public function show(Scholarship $scholarship)
    {
        $scholars = $scholarship->scholars;

        return Inertia::render('Coordinator/Scholarships/Scholars', [
            'scholarship' => $scholarship,
            'scholars' => $scholars,
        ]);
    }

    public function upload(Request $request, Scholarship $scholarship)
    {
        // $validator = Validator::make($request->all(), [
        //     'scholarship_id' => 'required|exists:scholarships,id',
        //     'file' => 'required|mimes:csv,txt',
        // ]);
    
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        $file = $request->file('file');

        $data = array_map('str_getcsv', file($file->getRealPath()));
        $header = array_shift($data);
        $requiredHeaders = ['first_name', 'last_name', 'email', 'course'];

        if (array_diff($requiredHeaders, $header)) {
            return response()->json(['message' => 'Invalid CSV format'], 422);
        }

        $insertData = [];
        foreach ($data as $row) {
            $rowData = array_combine($header, $row);
            $insertData[] = [
                'first_name' => $rowData['first_name'],
                'last_name' => $rowData['last_name'],
                'email' => $rowData['email'],
                'course' => $rowData['course'],
                'scholarship_id' => $scholarship->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Scholar::insert($insertData);

        return response()->json(['message' => 'Scholars uploaded successfully!']);
    }
}
