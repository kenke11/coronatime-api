<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function new_users_can_register()
	{
		Mail::fake();

		$response = $this
			->postJson(
				'/api/signup',
				[
					'username' => 'davit',
					'email'    => 'davit@gmail.com',
					'password' => 'password',
				]
			);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'success',
				'message' => 'Welcome to coronatime!!!',
			]);
	}

	/**
	 * @test
	 */
	public function registration_form_validation_works()
	{
		$response = $this
			->postJson(
				'/api/signup',
				[
					'username' => 'da',
					'email'    => 'davit',
					'password' => ' ',
				]
			);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'error',
				'message' => 'Validation error!',
			]);
	}
}
