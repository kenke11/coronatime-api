<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

class EmailVerificationController extends Controller
{
	public function verifyEmail($token)
	{
		$verifiedUser = User::where('email_verified_token', $token)->first();
		if (isset($verifiedUser))
		{
			$user = $verifiedUser;

			if (!$user->email_verified_at)
			{
				$user->email_verified_at = Carbon::now();
				$user->save();
//				return redirect()->route('login')->with('success', 'Your email has been verified!');
				return redirect('http://localhost:3000/login');
			}
			else
			{
//				return redirect()->route('login')->with('info', 'Your email has already been verified');
				return redirect('http://localhost:3000/login');
			}
		}
		else
		{
			redirect()->route('login')->with('error', 'Something wend wrong!');
		}
	}
}
