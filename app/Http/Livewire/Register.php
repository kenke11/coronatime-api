<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\PasswordConfirmation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
	public $username;

	public $email;

	public $password;

	public $password_confirmation;

	protected function rules()
	{
		return [
			'username'              => ['required', 'min:3', 'unique:users,username'],
			'email'                 => 'required|email|min:3|unique:users,email',
			'password'              => 'required|min:3',
			'password_confirmation' => ['required', new PasswordConfirmation($this->password)],
		];
	}

	public function createUser()
	{
		$this->validate();

		$user = User::create([
			'username'          => $this->username,
			'email'             => $this->email,
			'password'          => bcrypt($this->password),
		]);

		session()->flash('success', 'Welcome to coronatime!');

//		Auth::login($user);

		return redirect()->route('verification.notice');
	}

	public function render()
	{
		return view('livewire.auth.register');
	}
}
