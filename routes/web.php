<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', function ($lang) {
	cache()->put('lang', $lang);
	return redirect()->back();
})->name('lang');

Route::redirect('/', '/dashboard');

Route::middleware('guest')->group(function () {
	Route::get('/login', function () {
		return view('auth.login');
	})->name('login');

	Route::prefix('/forgot-password')->group(function () {
		Route::get('/', function () {
			return view('auth.verify-reset-password');
		})->name('verify-reset-password');

		Route::get('/reset-password/{token}', function ($token) {
			return view('auth.reset-password', ['token' => $token]);
		})->name('password.reset');
	});

	Route::get('/registration', function () {
		return view('auth.register');
	})->name('register');

	Route::get('/confirm-email', function () {
		return view('auth.verification-notice');
	})->name('verification.notice');
});

Route::middleware('auth')->group(function () {
	Route::get('/logout', function () {
		auth()->logout();
		return redirect()->route('login')->with('success', 'Good bey!');
	})->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/dashboard/by-country', function () {
		return view('by-country');
	})->name('by-country');
});

Route::get('/user/verify/{token}', [EmailVerificationController::class, 'verifyEmail'])->name('verified-email');
