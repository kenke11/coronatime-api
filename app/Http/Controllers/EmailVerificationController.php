<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

class EmailVerificationController extends Controller
{
	public function verifyEmail($token)
	{
		$user = User::where('email_verified_token', $token)->first();
		if (isset($verifiedUser))
		{
			if (!$user->email_verified_at)
			{
				$user->email_verified_at = Carbon::now();
				$user->save();
				return redirect('https://coronatime.tazo.redberryinternship.ge/login');
			}

			return redirect('https://coronatime.tazo.redberryinternship.ge/login');
		}

		return redirect('https://coronatime.tazo.redberryinternship.ge/login');
	}
}
