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
	protected $signature = 'command:update-statistics';

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
		$file = file_get_contents('https://devtest.ge/countries');

		$data = json_decode($file);

		foreach ($data as $country)
		{
			$response = Http::asForm()->post('https://devtest.ge/get-country-statistics', [
				'code' => $country->code,
			]);

			if ($response->successful())
			{
				$res = json_decode($response);

				$countr = new Country;
				$countr->country = $res->country;
				$countr->code = $res->code;
				$countr->confirmed = $res->confirmed;
				$countr->recovered = $res->recovered;
				$countr->critical = $res->critical;
				$countr->deaths = $res->deaths;
				$countr->save();
			}
			else
			{
				break;
			}
		}
		return 'success';
	}
}
