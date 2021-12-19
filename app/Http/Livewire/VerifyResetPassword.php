<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class VerifyResetPassword extends Component
{
	public $email;

	protected $rules = [
		'email' => 'required|email',
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function resetPassword()
	{
		$this->validate();

		$status = Password::sendResetLink(
			['email' => $this->email]
		);

		if ($status === Password::RESET_LINK_SENT)
		{
			return redirect()->route('verification.notice')->with([
				'status' => $status,
			]);
		}

		throw ValidationException::withMessages(
			[
				'email_not_exist' => 'This user does not exist',
			]
		);
	}

	public function render()
	{
		return view('livewire.auth.verify-reset-password');
	}
}
