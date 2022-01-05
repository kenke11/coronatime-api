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
	public function get_countries_and_post_them_with_database()
	{
		Http::fake([
			'https://devtest.ka/countries' => Http::response(
				json_decode(file_get_contents('tests/data-json/get-request.json'), true),
				200,
			),
		]);

		Http::fake([
			'https://devtest.ka/get-country-statistics' => Http::response(
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
