<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Requirements;
use App\Models\Scholar;
use Inertia\Inertia;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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

    public function send(Scholarship $scholarship, Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'requirements' => 'required|array',
            'application' => 'required|date',
            'deadline' => 'required|date'
        ]);

        // dd($request->all());
        // Get all scholars
        // $scholars = Scholar::all();
        $scholars = Scholar::where('scholarship_id', $scholarship->id)->get();

        // Create the same requirement for all scholars
        foreach ($scholars as $scholar) {
            Requirements::create([
                'scholar_id' => $scholar->id,
                'scholarship_id' => $scholarship->id,
                'requirements' => $request['requirements'],
                'application_start' => $request['application'],
                'deadline' => $request['deadline'],
            ]);

            $mailData = [
                'title' => $request['subject'],
                'body' => $request['content'],
            ];

            Mail::to($scholar->email)->send(new SendEmail($mailData));
        }

        return redirect()->route('requirements.index', $scholarship->id);
    }

    // public function send(Scholarship $scholarship, Request $request)
    // {
    //     $request->validate([
    //         'subject' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'requirements' => 'required|array',
    //         'application' => 'required|date',
    //         'deadline' => 'required|date'
    //     ]);

    //     // Get all scholars for the specified scholarship
    //     $scholars = Scholar::where('scholarship_id', $scholarship->id)->get();

    //     // Create the same requirement for all scholars
    //     foreach ($scholars as $scholar) {
    //         Requirements::create([
    //             'scholar_id' => $scholar->id,
    //             'scholarship_id' => $scholarship->id,
    //             'requirements' => $request['requirements'],
    //             'application_start' => $request['application'],
    //             'deadline' => $request['deadline'],
    //         ]);

    //         // Prepare the email data
    //         $mailData = [
    //             'title' => 'Mail from ItSolutionStuff.com',
    //             'body' => 'This is for testing email using smtp.'
    //         ];

    //         // Send email to the scholar's email address
    //         Mail::to($scholar->email)->send(new SendEmail($mailData));
    //     }

    //     // Return success message after email is sent
    //     dd("Emails are sent successfully.");

    //     // Redirect to sponsor index after all operations
    //     return redirect()->route('sponsor.index');
    // }
}
