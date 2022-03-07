<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'username'    => 'required|min:3',
			'password'    => 'required|min:3',
		];
	}

	public function messages()
	{
		return [
			'username.required'    => 'Vv',
			'password.required'    => 'password required',
		];
	}
}
