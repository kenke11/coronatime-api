<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateStatistic extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'update:statistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This commands update corona statistics';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = json_decode(Http::get('https://devtest.ge/countries'));

		if ($countries)
		{
			foreach ($countries as $country)
			{
				$response = Http::post('https://devtest.ge/get-country-statistics', [
					'code' => $country->code,
				]);
				sleep(2);
				$res = json_decode($response);

				$translations = [
					'en' => $country->name->en,
					'ka' => $country->name->ka,
				];

				Country::updateOrCreate(
					[
						'code'      => $res->code,
					],
					[
						'country'   => $translations,
						'confirmed' => $res->confirmed,
						'recovered' => $res->recovered,
						'critical'  => $res->critical,
						'deaths'    => $res->deaths,
					]
				);
			}
			echo 'Countries updated successfully!!!';
		}
		else
		{
			echo 'Countries not found!';
		}
	}
}
