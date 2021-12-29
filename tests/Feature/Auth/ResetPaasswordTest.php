<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Login;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\VerifyResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class ResetPaasswordTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function reset_password_link_screen_can_be_rendered()
	{
		$response = $this->get(route('verify-reset-password'));

		$response->assertOk();
	}

	/**
	 * @test
	 */
	public function verify_user_with_email()
	{
		$user = User::factory()->create([
			'email'             => 'tazo@gmail.com',
			'email_verified_at' => null,
		]);

		Livewire::test(VerifyResetPassword::class)
			->set('email', $user->email)
			->call('resetPassword')
			->assertHasNoErrors('email');
	}

	/**
	 * @test
	 */
	public function verify_user_with_email_validation()
	{
		Livewire::test(VerifyResetPassword::class)
			->set('email', ' ')
			->call('resetPassword')
			->set('email', 'doesnothave@example.com')
			->call('resetPassword')
			->set('email', 'notemail')
			->call('resetPassword')
			->assertHasErrors('email');
	}

	/**
	 * @test
	 */
	public function user_when_clicked_reset_password_button_from_email()
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

		$updatePassword = DB::table('password_resets')
			->where('email', $user->email)->first();

		$response = $this->get(route('password.reset', $updatePassword->token));

		$response->assertOk();
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

		Livewire::test(ResetPassword::class)
			->set('token', $token)
			->set('password', 'rame123')
			->set('password_confirmation', 'rame123')
			->call('resetPassword')
			->assertHasNoErrors();

		Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'rame123')
			->call('login')
			->assertHasNoErrors()
			->assertRedirect(route('dashboard'));
	}

	/**
	 * @test
	 */
	public function password_reset_validation_form()
	{
		Livewire::test(ResetPassword::class)
			->set('token', ' ')
			->call('resetPassword')
			->assertHasErrors('token');

		Livewire::test(ResetPassword::class)
			->set('password', 'ab')
			->call('resetPassword')
			->assertHasErrors('password')
			->set('password', ' ')
			->call('resetPassword')
			->assertHasErrors('password');

		Livewire::test(ResetPassword::class)
			->set('password', 'password')
			->set('password_confirmation', 'not_matches')
			->call('resetPassword')
			->assertHasErrors('password_confirmation');
	}
}
