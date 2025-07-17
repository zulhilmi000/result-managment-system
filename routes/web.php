<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Results;
use App\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Log;

// Login routes (for both admin and student)
Route::get('/', [Results::class, 'login']);
Route::post('/login', [Results::class, 'authenticate'])->name('login');

// Logout route
Route::post('/logout', [Results::class, 'logout'])->name('logout');

// Admin/Lecturer side routes

// Input result form 
Route::get('/form', [Results::class, 'create'])->name('form');

// Display results
Route::get('/result', [Results::class, 'display_result'])->name('result');

// Store result
Route::post('/store-result', [Results::class, 'store_result'])->name('result.store');

// Edit/Delete result
Route::get('/edit/{display2}', [Results::class, 'edit'])->name('edit');
Route::put('/edit/{display2}', [Results::class, 'update'])->name('update');
Route::delete('/delete/{display2}', [Results::class, 'destroy'])->name('delete');

// Display reports
Route::get('/showreport', [Results::class, 'displayReport'])->name('report.display');

// Admin registration
Route::get('/register', [Results::class, 'register']);
Route::post('/store/register', [Results::class, 'store_signup'])->name('register.store');
Route::get('/register-admin', [Results::class, 'signup_admin']);

// Student side routes

// Student registration
Route::get('/register-student', [Results::class, 'signup_student'])->name('student.register');
Route::post('/store/register-student', [Results::class, 'store_student'])->name('register-student.store');

// Student home
Route::get('/home', [Results::class, 'home'])->name('home');

// Student send report
Route::get('/feedback', [Results::class, 'student_report'])->name('report');
Route::post('/report', [Results::class, 'store_report'])->name('report.store');

// Contact page
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:100',
        'message' => 'required|string|max:1000',
    ]);
    return back()->with('success', 'Your message has been sent!');
})->name('contact.submit');

Route::get('/view-api-docs', function () {
    return view('docs.index');
});
