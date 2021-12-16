<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
	public $username;

	public $email;

	public $password;

	public $repeat_password;

	protected $rules = [
		'username'           => 'required|min:3',
		'email'              => 'required|email|min:3',
		'password'           => 'required|min:3',
		'repeat_password'    => 'required',
	];

	public function createUser()
	{
		$this->validate();

		$user = User::create([
			'username'          => $this->username,
			'email'             => $this->email,
			'email_verified_at' => now(),
			'password'          => bcrypt($this->password),
		]);

		session()->flash('success', 'Welcome to coronatime!');

		Auth::login($user);

		return redirect()->route('confirm-email');
	}

	public function render()
	{
		return view('livewire.auth.register');
	}
}
