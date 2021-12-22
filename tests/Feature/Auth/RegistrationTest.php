<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Register;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function new_users_can_register()
	{
		// TODO
		Mail::fake();

		Mail::assertNothingSent();

		Livewire::test(Register::class)
			->set('username', 'Jhon')
			->set('email', 'jhon@example.com')
			->set('password', 'password')
			->set('password', 'password')
			->call('createUser');
	}

	/**
	 * @test
	 */
	public function registration_form_validation_works()
	{
		Livewire::test(Register::class)
			->set('username', ' ')
			->call('createUser')
			->set('username', 'ab')
			->call('createUser')
			->assertHasErrors('username');

		Livewire::test(Register::class)
			->set('email', ' ')
			->call('createUser')
			->set('email', 'ab')
			->call('createUser')
			->set('email', 'example')
			->call('createUser')
			->assertHasErrors('email');

		Livewire::test(Register::class)
			->set('password', ' ')
			->call('createUser')
			->set('password', 'ab')
			->call('createUser')
			->assertHasErrors('password');

		Livewire::test(Register::class)
			->set('password', 'password')
			->call('createUser')
			->set('password_confirmation', 'password123')
			->call('createUser')
			->assertHasErrors('password_confirmation');
	}
}
