<?php

use App\Http\Controllers\EmailVerificationController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

		Route::get('/password-changed', function () {
			return view('auth.reset-password-notification');
		})->name('reset-password.success.notice');
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
	Route::get('/dashboard', function () {
		$countries = Country::all();
		$new_case = 0;
		$recovered = 0;
		$deaths = 0;

		foreach ($countries as $country)
		{
			$new_case += $country->confirmed;
			$recovered += $country->recovered;
			$deaths += $country->deaths;
		}

		return view('worldwide', [
			'new_case'  => $new_case,
			'recovered' => $recovered,
			'deaths'    => $deaths,
		]);
	})->name('dashboard');

	Route::get('/dashboard/by-country', function () {
		return view('by-country');
	})->name('by-country');
});

Route::get('/user/verify/{token}', [EmailVerificationController::class, 'verifyEmail'])->name('verified-email');
