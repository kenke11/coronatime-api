<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function confirm_user_with_email()
	{
		User::factory()->create([
			'username' => 'davit',
			'email'    => 'davit@gmail.com',
		]);

		$response = $this
			->postJson(
				'/api/reset-password-confirm',
				[
					'email'    => 'davit@gmail.com',
				]
			);

		$token = uniqid(base64_encode(Str::random(60)));

		DB::table('password_resets')->insert([
			'email'      => 'davit@gmail.com',
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		Mail::fake()->send('emails.resetPassword', ['token' => $token], function ($message) {
			$message->to('davit@gmail.com');
			$message->subject('Reset password');
		});

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'success',
				'message' => 'We have sent you a confirmation email.',
			]);
	}

	/**
	 * @test
	 */
	public function confirm_user_with_email_validation()
	{
		User::factory()->create([
			'username' => 'davit',
			'email'    => 'davit@gmail.com',
		]);

		Mail::fake();

		$response = $this
			->postJson(
				'/api/reset-password-confirm',
				[
					'email'    => 'davit',
				]
			);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'error',
				'message' => 'Validation error!',
			]);
	}

	/**
	 * @test
	 */
	public function password_reset_with_invalid_token()
	{
		$user = User::factory()->create([
			'email'             => 'tomy@gmail.com',
		]);

		$token = Str::random(60);

		$invalid_token = Str::random(60);

		DB::table('password_resets')->insert([
			'email'      => $user->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$response = $this
			->postJson(
				'/api/reset-password',
				[
					'token'       => $invalid_token,
					'password'    => 'davit',
				]
			);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'error',
				'message' => 'Invalid token!',
				'errors'  => 'invalid_token',
			]);
	}

	/**
	 * @test
	 */
	public function password_reset_success()
	{
		$user = User::factory()->create([
			'email'             => 'tomy@gmail.com',
		]);

		$token = Str::random(60);

		DB::table('password_resets')->insert([
			'email'      => $user->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$response = $this
			->postJson(
				'/api/reset-password',
				[
					'token'       => $token,
					'password'    => 'davit',
				]
			);

		$response
			->assertStatus(200)
			->assertJson([
				'status'  => 'success',
				'message' => 'Password successfully updated!',
			]);
	}

	/**
	 * @test
	 */
	public function password_reset_validation_form()
	{
		$response = $this
			->postJson(
				'/api/reset-password',
				[
					'token'       => ' ',
					'password'    => 'da',
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
