<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'usertype:super_admin'])->group(function () {

    Route::get('/admin/dashboard', [SuperAdminController::class, 'dashboard'])
        ->name('super_admin.dashboard');

    //Sponsors
    Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsor.index');
    Route::post('/sponsors', [SponsorController::class, 'store'])->name('sponsor.store');


    //Scholarships
    Route::get('/sponsors/{sponsor}', [ScholarshipController::class, 'create'])->name('scholarships.create');
    Route::post('/sponsors/{sponsor}/create', [ScholarshipController::class, 'store'])->name('scholarships.store');

    
    Route::get('/scholarships', [ScholarshipController::class, 'scholarship'])->name('scholarships.index');
    // Route::post('/scholarships', [ScholarshipController::class, 'store'])->name('scholarships.store');
    Route::put('/scholarships/{id}', [ScholarshipController::class, 'update'])->name('scholarships.update');

    Route::post('/scholarships/{scholarship}/send-access/send', [EmailController::class, 'send'])->name('requirements.send');
    //ScholarshipsTabs
    Route::get('/scholarships/{scholarship}/requirements', [ScholarshipController::class, 'requirementsTab'])->name('requirementsTab.requirements');
    Route::get('/scholarships/{scholarship}/send-access', [EmailController::class, 'index'])->name('requirements.index');

    //Scholars
    Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show'])->name('scholarship.show');
    Route::post('/scholarships/{scholarship}/upload', [ScholarController::class, 'upload'])->name('scholars.upload');

    // Messaging
    Route::get('/messages', [MessageController::class, 'index'])->name('messaging.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messaging.store');

    //Applicants
    Route::get('/scholarships/{scholarship}/applicants', [ApplicationController::class, 'show'])->name('scholarships.applicants');

    //Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    // Route::get('/scholarships/{scholarship}', [ScholarController::class, 'index'])->name('scholars.index');
    // Route::get('/coordinator/scholarships/scholars', [ScholarController::class, 'index'])->name('scholars.index');
    // Route::inertia('/coordinator/scholarships/scholars', 'Coordinator/Scholarships/Scholars')->name('scholars');

});

Route::middleware(['auth', 'usertype:student', 'verified'])->group(function () {
    // dashboard
    Route::get('/dashboard', [StudentController::class, 'dashboard'])
        ->name('student.dashboard');

    // scholarship
    Route::get('/student/scholarship', [StudentController::class, 'scholarship'])->name('student.scholarship');
    Route::get('/student/scholarship/confirmation', [StudentController::class, 'confirmation'])->name('student.confirmation');

    //profile
    Route::get('/myProfile', [StudentController::class, 'profile'])->name('student.profile');

    // Route::get('/student/scholarship', [StudentController::class, 'scholarship'])->name('student.scholarships');
    
    // application
    Route::get('/student/application', [StudentController::class, 'application'])->name('student.application');
    Route::post('/student/application/upload', [StudentController::class, 'applicationUpload'])->name('student.application.upload');


    //VerifyAccount
    Route::get('/verify-account', [StudentController::class, 'verifyAccount'])->name('student.verify-account');


    Route::get('/available-scholarships', [ApplicationController::class, 'index'])->name('available.index');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('application.store');;
});

Route::middleware(['auth'])->group(function () {

    //VerifyAccount
    Route::get('/verify-account', [StudentController::class, 'verifyAccount'])->name('student.verify-account');
    Route::post('/verify-account/verifying', [StudentController::class, 'verifyingAccount'])->name('student.verify-account.verifying');


});




require __DIR__ . '/auth.php';
