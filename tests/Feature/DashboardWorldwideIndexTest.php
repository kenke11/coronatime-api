<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardWorldwideIndexTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function worldwide_statistic_show()
	{
		$user = User::factory()->create([
			'username'          => 'tazo1',
			'email'             => 'tazo1@gmail.com',
			'email_verified_at' => now(),
		]);

		$this->actingAs($user)
			->get(route('dashboard'));

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

		$response = $this->get('dashboard');

		$response->assertSuccessful();
		$response->assertSee($new_case);
		$response->assertSee($recovered);
		$response->assertSee($deaths);
	}
}
