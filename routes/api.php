<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;


Route::get('/doctor-availability', [AvailabilityController::class, 'getAvailableTimes']);
// Route::get('/doctor-availability', [DoctorController::class, 'getDoctorAvailability']);
Route::get('/doctor/{id}', [AvailabilityController::class, ' show']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// API Routes (add to routes/api.php)
Route::prefix('bookings')->group(function () {
    Route::post('/', [BookingController::class, 'store']);
    Route::get('/available-slots', [BookingController::class, 'getAvailableSlots']);
    Route::get('/{id}', [BookingController::class, 'show']);
    Route::patch('/{id}/cancel', [BookingController::class, 'cancel']);
    Route::get('/', [BookingController::class, 'index']); // Admin only
});

// Web Routes (add to routes/web.php)
Route::get('/booking', function () {
    return view('booking'); // Your booking page view
});
