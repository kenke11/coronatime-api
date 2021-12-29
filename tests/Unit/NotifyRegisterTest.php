<?php

namespace Tests\Unit;

use App\Jobs\NotifyRegister;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\TestCase;

class NotifyRegisterTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function is_sends_an_email_when_register()
	{
		//        TODO
		$user = User::factory([
			'email'             => 'tom@gmail.com',
			'email_verified_at' => null,
		]);

		Mail::fake();

		NotifyRegister::dispatch($user);

		Mail::assertQueued(VerifyEmail::class, function ($mail) {
			return $mail->hasTo('tom@gmail.com');
		});
	}
}
