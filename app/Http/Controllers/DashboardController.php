<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
{
	public function index()
	{
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
	}
}
