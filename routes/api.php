<?php

use App\Http\Controllers\API\AuthController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup', [AuthController::class, 'signup']);

Route::post('/reset-password-confirm', [AuthController::class, 'confirmByEmail']);

Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
	Route::get('/countries', function () {
		return Country::all();
	});
});
