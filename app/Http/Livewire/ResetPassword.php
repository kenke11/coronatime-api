<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\PasswordConfirmation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

		$updatePassword = DB::table('password_resets')
			->where('token', $this->token)->first();

		if (!$updatePassword)
		{
			return redirect()->route('login')->with('error', 'Invalid token!');
		}

		User::where('email', $updatePassword->email)
			->update(['password' => Hash::make($this->password)]);

		DB::table('password_resets')->where(['token'=> $this->token])->delete();

		return redirect()->route('login');
	}

	public function render()
	{
		return view('livewire.auth.reset-password');
	}
}
