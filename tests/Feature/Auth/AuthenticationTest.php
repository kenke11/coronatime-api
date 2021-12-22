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

		$response = $this->get(route('dashboard'));
		$response->assertOk();
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

		Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'password')
			->call('login')
			->assertHasErrors('not_verified');

		$response = $this->get(route('dashboard'));
		$response->assertRedirect(route('login'));
	}

	/**
	 * @test
	 */
	public function user_login_with_remember_me()
	{
		// TODO
		$user = User::factory()->create([
			'username'    => 'davit',
		]);

		Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'password')
			->set('remember_me', 'remember_me')
			->call('login')
			->assertRedirect(route('dashboard'));

		$response = $this->get(route('dashboard'));
		$response->assertOk();
	}

	/**
	 * @test
	 */
	public function user_authentication_with_incorrect_username_or_password()
	{
		$user = User::factory()->create([
			'username' => 'davit',
		]);

		Livewire::test(Login::class)
			->set('username', $user->username)
			->set('password', 'wrong_password')
			->call('login')
			->assertHasErrors('not_login');

		$response = $this->get(route('dashboard'));
		$response->assertRedirect(route('login'));
	}

	/**
	 * @test
	 */
	public function user_login_form_validation_works()
	{
		Livewire::test(Login::class)
			->set('username', ' ')
			->call('login')
			->set('username', 'wr')
			->call('login')
			->assertHasErrors('username');

		Livewire::test(Login::class)
			->set('password', ' ')
			->call('login')
			->set('password', 'wr')
			->call('login')
			->assertHasErrors('password');
	}
}
