<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CostumeCommandTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function get_countries_and_decode_with_json()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response(
				json_decode(file_get_contents('tests/data-json/get-request.json'), true),
				200,
			),
		]);

		Http::fake([
			'https://devtest.ge/get-country-statistics' => Http::response(
				json_decode(file_get_contents('tests/data-json/post-request.json'), true),
				200,
			),
		]);

		$this->artisan('command:update-statistics');

		$this->assertDatabaseHas('countries', [
			'code' => 'GE',
		]);
	}
}
