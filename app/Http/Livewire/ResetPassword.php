<?php

namespace App\Http\Livewire;

use App\Rules\PasswordConfirmation;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
	public $token;

	public $password;

	public $password_confirmation;

	protected function rules()
	{
		return [
			'token'                 => 'required',
			'password'              => ['required', 'min:3'],
			'password_confirmation' => [new PasswordConfirmation($this->password)],
		];
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function resetPassword()
	{
		$this->validate();

		$request = [
			'password' => $this->password,
		];
		$status = Password::reset(
			$request,
		);
	}

	public function render()
	{
		return view('livewire.auth.reset-password');
	}
}
