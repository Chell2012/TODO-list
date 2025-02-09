<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/register', [AuthController::class, 'store'])->name('register.api');
Route::post('/login', [AuthController::class, 'login'])->name('login.api');
Route::middleware(['auth', 'verified'])->group(function () {

});
