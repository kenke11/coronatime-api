<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
{
	public function index()
	{
		$new_case = Country::sum('confirmed');
		$recovered = Country::sum('recovered');
		$deaths = Country::sum('confirmed');

		return view('worldwide', [
			'new_case'  => $new_case,
			'recovered' => $recovered,
			'deaths'    => $deaths,
		]);
	}
}
