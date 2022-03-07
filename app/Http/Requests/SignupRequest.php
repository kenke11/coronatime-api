<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignupRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'username'    => 'required|min:3|unique:users,username',
			'email'       => 'required|min:3|unique:users,email',
			'password'    => 'required|min:3',
		];
	}

	public function failedValidation(Validator $validator)
	{
		throw new HttpResponseException(response()->json([
			'status'  => 'error',
			'message' => 'Validation error!',
			'errors'  => $validator->errors(),
		]));
	}
}
