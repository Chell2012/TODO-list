<?php

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Руты для подтверждения email
 * @return void
 */
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Письмо отправлено']);
})->middleware(['auth', 'throttle:6,1']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return response()->json(['message' => 'Email подтвержден']);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return response()->json(['message' => 'Подтвердите email']);
})->middleware('auth')->name('verification.notice');

Route::get('/register', [AuthController::class, 'create'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.web');
Route::get('/login', [AuthController::class, 'show'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
