<?php

use App\Application\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::post('/create', [UserController::class, 'create']);
});
