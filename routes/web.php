<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', TaskController::class);
});

require __DIR__.'/auth.php';
