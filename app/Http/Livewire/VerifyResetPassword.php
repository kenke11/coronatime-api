<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class VerifyResetPassword extends Component
{
	public $email;

	protected $rules = [
		'email' => 'required|email|exists:users',
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function resetPassword()
	{
		$this->validate();
		$token = Str::random(60);

		DB::table('password_resets')->insert([
			'email'      => $this->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		Mail::send('emails.resetPassword', ['token' => $token], function ($message) {
			$message->to($this->email);
			$message->subject('Reset password');
		});

		return redirect()->route('verification.notice')->with('success', 'We have e-mailed your password reset link!');
	}

	public function render()
	{
		return view('livewire.auth.verify-reset-password');
	}
}
