<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

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
