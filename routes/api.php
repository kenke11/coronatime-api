<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('/countries', function () {
	// index
	$file = file_get_contents('https://devtest.ge/countries');
	$data = json_decode($file);

	return $data;
});

Route::get('/countries/{id}', function ($id) {
	// show
	$file = file_get_contents('https://devtest.ge/countries');
	$data = json_decode($file);

	$response = Http::asForm()->post('https://devtest.ge/get-country-statistics', [
		'code' => $data[$id]->code,
	]);

	return json_decode($response)->id;
});
