<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api'])->group(function () {
    Route::resource('dashboard', TaskController::class);
});
require __DIR__.'/auth.php';
