<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function user_login_with_verified_email()
	{
		$user = User::factory()->create([
			'username' => 'davit',
		]);

		Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'password')
			->call('login')
			->assertRedirect(route('dashboard'));
	}

	/**
	 * @test
	 */
	public function user_login_with_not_verified_email()
	{
		$user = User::factory()->create([
			'username'          => 'davit',
			'email_verified_at' => null,
		]);

		$response = Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'password')
			->call('login');

		if (empty($_SESSION['']))
		{
			$response->assertHasErrors('not_verified');
		}
	}

	/**
	 * @test
	 */
	public function users_can_not_login()
	{
		$user = User::factory()->create([
			'username' => 'davit',
		]);

		Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'wrong_password')
			->call('login')
			->assertHasErrors('not_login');
	}
}
