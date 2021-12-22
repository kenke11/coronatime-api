<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function after_registers_send_an_email_to_users_email()
	{
		// TODO
		Livewire::test(Register::class)
			->set('username', 'Jhon')
			->set('email', 'jhon@example.com')
			->set('password', 'password')
			->set('password', 'password')
			->call('createUser');

		Mail::fake();
	}

	/**
	 * @test
	 */
	public function user_when_confirming_verification()
	{
		$user = User::factory()->create([
			'email_verified_at' => null,
		]);

		Event::fake();

		$this->get(route('verified-email', $user->email_verified_token));

		$this->assertTrue($user->fresh()->hasVerifiedEmail());
	}
}
