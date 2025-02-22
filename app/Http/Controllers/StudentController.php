<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Requirements;
use App\Models\User;
use App\Models\Scholar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Student/Dashboard/Feed');
    }
    public function verifyAccount()
    {
        return Inertia::render('Student/VerificationAccount/Verification');
    }

    public function verifyingAccount(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
            
        ]);

        // dd($request->all());

        $password = Hash::make($request->password);

        $user = User::where('email', $request->email)->first();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $password,
            'email_verified_at' => $user->markEmailAsVerified()
        ]);
        
        event(new Verified($user));
        
        return redirect()->route('student.dashboard');
    }

    public function scholarship()
    {
        return Inertia::render('Student/Scholarship');
    }
    public function application(User $user)
    {

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

    public function applicationUpload(Request $request, Scholar $scholar)
    {

        $request->validate([
            'files.*' => 'required|file|',
        ]);

        $scholar = Scholar::where('email', Auth::user()->email)->first();

        $scholar_id = $scholar->id;
        $requirement = Requirements::where('id', $scholar_id)->first();


        $uploadedFiles = [];

        foreach ($request->file('files') as $index => $file) {
            if ($file) {
                $path = $file->store('requirements/' . Auth::user()->name, 'public');
                $uploadedFiles = [
                    'requirement_index' => $index,
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName()
                ];
            }
        }

        $requirement->update([
            'submitted_requirements' => json_encode($uploadedFiles)
        ]);

        return redirect()->back()->with('message', 'Files uploaded successfully');
    }
}