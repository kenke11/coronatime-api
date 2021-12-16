<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Nette\Schema\ValidationException;

class Login extends Component
{
	public $username;

	public $password;

	protected $rules = [
		'username'    => 'required|min:3',
		'password'    => 'required|min:3',
	];

	public function login()
	{
		if (auth()->attempt($this->validate()))
		{
			return redirect()->route('worldwide')->with('success', 'Welcome back!');
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
