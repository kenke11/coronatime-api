<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
	public $username;

	public $password;

	public $remember_me;

	protected $rules = [
		'username'    => 'required|min:3',
		'password'    => 'required|min:3',
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function login()
	{
		$this->validate();

		if (auth()->attempt(['email' => $this->username, 'password' => $this->password], $this->remember_me) || auth()->attempt(['username' => $this->username, 'password' => $this->password], $this->remember_me))
		{
			if (auth()->user()->email_verified_at === null)
			{
				auth()->logout();
				$this->addError('not_verified', 'User is not verified!');
			}
			else
			{
				return redirect()->route('dashboard')->with('success', 'Welcome back!');
			}
		}
		else
		{
			throw ValidationException::withMessages(
				[
					'not_login' => 'Username or password incorrect',
				]
			);
		}
	}

	public function render()
	{
		return view('livewire.auth.login');
	}
}
