<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/home', [PagesController::class, 'index'])->name('home');
Route::get('/search', [PagesController::class, 'search'])->name('search');
// Packages Page Route
Route::get('/packages', [PagesController::class, 'index'])->name('package.client');

// Dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Packages
Route::resource('package', PackageController::class)->except(['show']);
Route::get('/package/{id}', [PackageController::class, 'show'])->name('package.show');
Route::get('/bridal-makeup-packages', [PackageController::class, 'bridalPackages'])->name('bridal.packages');

// Booking Routes
Route::middleware('auth',)->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/{id}/{type}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::put('/booking/{id}/status', [BookingController::class, 'updateStatus'])->name('booking.updateStatus');

    // Updated 'create' route to include both 'id' and 'type'
    Route::get('/booking/create/{id}/{type?}', [BookingController::class, 'create'])->name('booking.create');

    Route::get('/available-slots', [BookingController::class, 'getAvailableSlots']);
});


// Services
Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
Route::resource('service', ServiceController::class)->except(['show']);
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/services', [ServiceController::class, 'showServices'])->name('services.public');

//about page
Route::get('/about', function () {
    return view('about');
})->name('about');


//contact page
use Illuminate\Http\Request;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact-submit', function (Request $request) {
    // Handle form submission (store in DB, send email, etc.)
    return back()->with('success', 'Your message has been sent!');
})->name('contact.submit');





// User Routes
Route::get('/users', [UserController::class, 'index'])->name('user.index');

// Profile (Authentication Required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__ . '/auth.php';
