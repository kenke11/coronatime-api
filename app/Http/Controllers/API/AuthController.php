<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	private $idToken;

	private $resetPasswordToken;

	public function __construct()
	{
		$this->idToken = uniqid(base64_encode(Str::random(40)));
		$this->resetPasswordToken = uniqid(base64_encode(Str::random(60)));
	}

	public function login(LoginRequest $request)
	{
		$request->validated();

		if (auth()->attempt(['email' => $request->username, 'password' => $request->password], $request->remember_me) || auth()->attempt(['username' => $request->username, 'password' => $request->password], $request->remember_me))
		{
			$user = auth()->user();
			if ($user->email_verified_at)
			{
				return response()->json([
					'status'  => 'success',
					'message' => 'User logged in successfully!!!',
					'user'    => $user,
					'idToken' => $this->idToken,
				]);
			}

			return response()->json([
				'status'   => 'error',
				'message'  => 'Email not verified.',
				'error'    => 'email_not_verified',
			]);
		}

		return response()->json([
			'status'   => 'error',
			'message'  => 'Username or password incorrect',
			'error'    => 'not_login',
		]);
	}

	public function signup(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'username'    => 'required|min:3|unique:users,username',
				'email'       => 'required|min:3|unique:users,email',
				'password'    => 'required|min:3',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

		$user = User::create([
			'username'             => $request->username,
			'email'                => $request->email,
			'email_verified_token' => Str::random(60),
			'password'             => bcrypt($request->password),
		]);

		Mail::to($user->email)->send(new VerifyEmail($user));

		return response()->json([
			'status'  => 'success',
			'message' => 'Welcome to coronatime!!!',
		]);
	}

	public function confirmByEmail(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'email' => 'required|email|exists:users',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

		DB::table('password_resets')->insert([
			'email'      => $request->email,
			'token'      => $this->resetPasswordToken,
			'created_at' => Carbon::now(),
		]);

		Mail::send('emails.resetPassword', ['token' => $this->resetPasswordToken], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Reset password');
		});

		return response()->json([
			'status'  => 'success',
			'message' => 'We have sent you a confirmation email.',
		]);
	}

	public function resetPassword(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'token'    => 'required',
				'password' => 'required|min:3',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

		$updatePassword = DB::table('password_resets')
			->where('token', $request->token)->first();

		if (!$updatePassword)
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Invalid token!',
				'errors'  => 'invalid_token',
			]);
		}

		User::where('email', $updatePassword->email)
			->update(['password' => Hash::make($request->password)]);

		DB::table('password_resets')->where(['token'=> $request->token])->delete();

		return response()->json([
			'status'  => 'success',
			'message' => 'Password successfully updated!',
		]);
	}
}
