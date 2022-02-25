<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function user_login_with_correct_data_and_with_verified_email()
	{
		User::factory()->create([
			'username' => 'davit',
			'email'    => 'davit@gmail.com',
		]);

		$response = $this->postJson('/api/login', ['username' => 'davit', 'password' => 'password']);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'success',
				'message' => 'User logged in successfully!!!',
			]);
	}

	/**
	 * @test
	 */
	public function user_login_with_not_verified_email()
	{
		User::factory()->create([
			'username'          => 'davit',
			'email_verified_at' => null,
		]);

		$response = $this->postJson('/api/login', ['username' => 'davit', 'password' => 'password']);

		$response
			->assertStatus(200)
			->assertJson([
				'status'   => 'error',
				'message'  => 'Email not verified.',
				'error'    => 'email_not_verified',
			]);
	}

	/**
	 * @test
	 */
	public function user_login_with_incorrect_data()
	{
		User::factory()->create([
			'username' => 'davit',
			'email'    => 'davit@gmail.com',
		]);

		$response = $this->postJson('/api/login', ['username' => 'davit_incorrect', 'password' => 'password_incorrect']);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'error',
				'message' => 'Username or password incorrect',
				'error'   => 'not_login',
			]);
	}

	/**
	 * @test
	 */
	public function user_login_form_validation_works()
	{
		$responseA = $this->postJson('/api/login', ['username' => 'ta', 'password' => 'pa']);

		$responseA
			->assertStatus(200)
			->assertJson([
				'status'  => 'error',
				'message' => 'Validation error!',
			]);

		$responseB = $this->postJson('/api/login', ['username' => ' ', 'password' => ' ']);

		$responseB
			->assertStatus(200)
			->assertJson([
				'status'  => 'error',
				'message' => 'Validation error!',
			]);
	}
}
