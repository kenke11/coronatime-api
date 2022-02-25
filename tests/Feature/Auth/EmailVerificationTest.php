<?php

namespace Tests\Feature\Auth;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function mailable_content()
	{
		$user = User::factory()->create();

		$mailable = new VerifyEmail($user);

		$mailable->assertSeeInHtml($user->email_verified_token);
		$mailable->assertSeeInHtml('Confirmation email');
	}

	/**
	 * @test
	 */
	public function user_when_clicked_email_verification_button_form_email()
	{
		$user = User::factory()->create([
			'email'             => 'tomy@gmail.com',
			'email_verified_at' => null,
		]);

		$response = $this->get(route('verified-email', $user->email_verified_token));

		$response->assertRedirect('https://coronatime.tazo.redberryinternship.ge/login');
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

		$response = $this->get(route('verified-email', $user->email_verified_token));

		$this->assertTrue($user->fresh()->hasVerifiedEmail());

		$response->assertRedirect('https://coronatime.tazo.redberryinternship.ge/login');
	}

	/**
	 * @test
	 */
	public function user_target_verification_link_when_already_verification()
	{
		$user = User::factory()->create([
			'email_verified_at' => now(),
		]);

		Event::fake();

		$response = $this->get(route('verified-email', $user->email_verified_token));

		$response->assertRedirect('https://coronatime.tazo.redberryinternship.ge/login');
	}

	/**
	 * @test
	 */
	public function user_when_confirming_verification_with_incorrect_token()
	{
		$user = User::factory()->create([
			'email_verified_at' => null,
		]);

		Event::fake();

		$this->get(route('verified-email', Str::random(60)));

		$this->assertFalse($user->fresh()->hasVerifiedEmail());
	}
}
