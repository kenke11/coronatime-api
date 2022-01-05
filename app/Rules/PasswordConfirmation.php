<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordConfirmation implements Rule
{
	public $password;

	/**
	 * Create a new rule instance.
	 *
	 * @return void
	 */
	public function __construct($password)
	{
		$this->password = $password;
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param string $attribute
	 * @param mixed  $value
	 *
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		return $this->password === $value ? true : false;
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message()
	{
		return [
			'en' => 'The password does not match.',
			'ka' => 'პაროლი არ ემთხვევა.',
		];
	}
}
