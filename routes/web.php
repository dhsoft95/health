<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterTrackingController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TherapyController;
use Illuminate\Support\Facades\Route;


// routes/web.php

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services Routes
Route::get('/services/therapy', [ServiceController::class, 'therapy'])->name('services.therapy');
Route::get('/services/psychiatry', [ServiceController::class, 'psychiatry'])->name('services.psychiatry');
Route::get('/services/self-guided', [ServiceController::class, 'selfGuided'])->name('services.self-guided');

// Therapy Routes
Route::get('/therapy/individual', [TherapyController::class, 'individual'])->name('therapy.individual');
Route::get('/therapy/couples', [TherapyController::class, 'couples'])->name('therapy.couples');
Route::get('/therapy/teen', [TherapyController::class, 'teen'])->name('therapy.teen');
Route::get('/therapy/employee', [TherapyController::class, 'employee'])->name('therapy.employee');

// Resources Routes
Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
Route::get('/resources/{slug}', [ResourceController::class, 'show'])->name('resources.show');

// About Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact Route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Appointment Route
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments');


Route::get('/resources/{resource}', [ResourceController::class, 'show'])->name('resources.show');


// In routes/web.php
Route::get('/appointments/create', [AppointmentController::class, 'create'])
    ->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])
    ->name('appointments.store');
Route::get('/appointments/thank-you', [AppointmentController::class, 'thankYou'])
    ->name('appointments.thank-you');


Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/newsletter/track/{id}', [NewsletterTrackingController::class, 'trackOpen'])->name('newsletter.track-open');
