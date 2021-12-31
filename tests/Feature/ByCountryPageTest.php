<?php

namespace Tests\Feature;

use App\Http\Livewire\Statistics;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ByCountryPageTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function search_works_correctly()
	{
		$countryOne = Country::create([
			'code'    => 'GE',
			'country' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 100,
			'recovered' => 100,
			'critical'  => 100,
			'deaths'    => 100,
		]);

		$countryTwo = Country::create([
			'code'    => 'EN',
			'country' => [
				'en' => 'England',
				'ka' => 'ინგლისი',
			],
			'confirmed' => 200,
			'recovered' => 200,
			'critical'  => 200,
			'deaths'    => 200,
		]);

		Livewire::test(Statistics::class)
			->set('search', 'England')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 1 && $countries->first()->country === 'England';
			});
	}

	/**
	 * @test
	 */
	public function sorting_works_correctly_by_location()
	{
		$countryOne = Country::create([
			'code'    => 'GE',
			'country' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 100,
			'recovered' => 100,
			'critical'  => 100,
			'deaths'    => 100,
		]);

		$countryTwo = Country::create([
			'code'    => 'EN',
			'country' => [
				'en' => 'England',
				'ka' => 'ინგლისი',
			],
			'confirmed' => 200,
			'recovered' => 200,
			'critical'  => 200,
			'deaths'    => 200,
		]);

		Livewire::test(Statistics::class)
			->call('location')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'Georgia';
			})
			->call('location')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'England';
			});
	}

	/**
	 * @test
	 */
	public function sorting_works_correctly_by_new_case()
	{
		$countryOne = Country::create([
			'code'    => 'GE',
			'country' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 100,
			'recovered' => 100,
			'critical'  => 100,
			'deaths'    => 100,
		]);

		$countryTwo = Country::create([
			'code'    => 'EN',
			'country' => [
				'en' => 'England',
				'ka' => 'ინგლისი',
			],
			'confirmed' => 200,
			'recovered' => 200,
			'critical'  => 200,
			'deaths'    => 200,
		]);

		Livewire::test(Statistics::class)
			->call('newCase')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'Georgia';
			})
			->call('newCase')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'England';
			});
	}

	/**
	 * @test
	 */
	public function sorting_works_correctly_by_deaths()
	{
		$countryOne = Country::create([
			'code'    => 'GE',
			'country' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 100,
			'recovered' => 100,
			'critical'  => 100,
			'deaths'    => 100,
		]);

		$countryTwo = Country::create([
			'code'    => 'EN',
			'country' => [
				'en' => 'England',
				'ka' => 'ინგლისი',
			],
			'confirmed' => 200,
			'recovered' => 200,
			'critical'  => 200,
			'deaths'    => 200,
		]);

		Livewire::test(Statistics::class)
			->call('deaths')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'Georgia';
			})
			->call('deaths')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'England';
			});
	}

	/**
	 * @test
	 */
	public function sorting_works_correctly_by_recovered()
	{
		$countryOne = Country::create([
			'code'    => 'GE',
			'country' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 100,
			'recovered' => 100,
			'critical'  => 100,
			'deaths'    => 100,
		]);

		$countryTwo = Country::create([
			'code'    => 'EN',
			'country' => [
				'en' => 'England',
				'ka' => 'ინგლისი',
			],
			'confirmed' => 200,
			'recovered' => 200,
			'critical'  => 200,
			'deaths'    => 200,
		]);

		Livewire::test(Statistics::class)
			->call('recovered')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'Georgia';
			})
			->call('recovered')
			->assertViewHas('countries', function ($countries) {
				return $countries->count() === 2 && $countries->first()->country === 'England';
			});
	}
}
