<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\VerifyResetPassword;
use Livewire\Livewire;
use Tests\TestCase;

class ResetPaasswordTest extends TestCase
{
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
	}

	/**
	 * @test
	 */
	public function email_sending_form_validation()
	{
		Livewire::test(VerifyResetPassword::class)
			->set('email', ' ')
			->call('resetPassword')
			->set('email', 'ab')
			->call('resetPassword')
			->set('email', 'example')
			->call('resetPassword')
			->assertHasErrors('email');
	}
}
