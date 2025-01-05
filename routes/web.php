<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarController;
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


Route::middleware(['auth', 'role:coordinator'])->group(function () {

    Route::get('/coordinator/dashboard', [CoordinatorController::class, 'dashboard'])
        ->name('coordinator.dashboard');

    //Scholarships
    Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
    Route::post('/scholarships', [ScholarshipController::class, 'store'])->name('scholarships.store');
    Route::put('/scholarships/{id}', [ScholarshipController::class, 'update'])->name('scholarships.update');

    //Scholars
    Route::get('/scholarships/{scholarship}', [ScholarController::class, 'show'])->name('scholars.index');
    Route::post('/scholarships/{scholarship}/upload', [ScholarController::class, 'upload'])->name('scholars.upload');

    //Applicants
    Route::get('/scholarships/{scholarship}/applicants', [ApplicationController::class, 'show'])->name('scholarships.applicants');

    // Route::get('/scholarships/{scholarship}', [ScholarController::class, 'index'])->name('scholars.index');
    // Route::get('/coordinator/scholarships/scholars', [ScholarController::class, 'index'])->name('scholars.index');
    // Route::inertia('/coordinator/scholarships/scholars', 'Coordinator/Scholarships/Scholars')->name('scholars');

});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])
        ->name('student.dashboard');

    
        
    Route::get('/available-scholarships', [ApplicationController::class, 'index'])->name('available.index');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('application.store');;
});




require __DIR__ . '/auth.php';
