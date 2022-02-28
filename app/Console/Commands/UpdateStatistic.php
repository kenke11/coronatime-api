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
				$statistic = json_decode(Http::post('https://devtest.ge/get-country-statistics', [
					'code' => $country->code,
				]));

				sleep(2);

				$translations = [
					'en' => $country->name->en,
					'ge' => $country->name->ka,
				];

				Country::updateOrCreate(
					[
						'code'      => $statistic->code,
					],
					[
						'country'   => $translations,
						'confirmed' => $statistic->confirmed,
						'recovered' => $statistic->recovered,
						'critical'  => $statistic->critical,
						'deaths'    => $statistic->deaths,
					]
				);
			}
			echo 'Countries updated successfully!!!';
		}
		echo 'This fetching has been finished';
	}
}
