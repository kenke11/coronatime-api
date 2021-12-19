<?php

namespace App\Http\Livewire;

use App\Rules\PasswordConfirmation;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Illuminate\Support\Str;

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
			'email'                 => 'admin@admin.com',
			'password'              => $this->password,
			'password_confirmation' => $this->password_confirmation,
			'token'                 => $this->token,
		];
		$status = Password::reset(
			$request,
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		if ($status === Password::PASSWORD_RESET)
		{
			return redirect()->route('login')->with('status', $status);
		}
		else
		{
			dd('ara');
			return redirect()->route('login')->with(['error' => $status]);
		}
	}

	public function render()
	{
		return view('livewire.auth.reset-password');
	}
}
