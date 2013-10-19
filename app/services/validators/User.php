<?php namespace Services\Validators;

class User extends Validator {
	
	protected $rules = [];

	protected $messages = [];

	/**
	 * Sets validation rules for logging in a user
	 * 
	 * @return array
	 */
	public function onLogin()
	{
		$this->rules = [
			'username' => 'required',
			'password' => 'required'
		];

		return $this;
	}

	/**
	 * Sets validation rules for registering a user
	 * 
	 * @return array
	 */
	public function onRegister()
	{
		$this->rules = [
			'username' => 'required|alpha_num|unique:users,username',
			'email'	   => 'required|email|unique:users,email',
			'password' => 'required',
			'confirm'  => 'required|same:password'
		];

		return $this;
	}

	public function onUpdatePassword()
	{
		$this->rules = [
			'current' => 'required',
			'new'	  => 'required|different:current'
		];

		$this->messages = [
			'new.different'	=> 'Password cannot be the same as the old one.'
		];

		return $this;
	}

	public function onUpdateEmail()
	{
		$this->rules = [
			'email' => 'required|email'
		];

		return $this;
	}

	public function onPasswordReset()
	{
		$this->rules = [
			'password' 				  => 'required',
			'password_confirmation'	  => 'required|same:password'
		];

		$this->messages = [
			'password_confirmation.same'	=> 'Passwords must match.'
		];

		return $this;	
	}

	public function onPasswordRequest()
	{
		$this->rules = [
			'email' => 'required|email'
		];

		return $this;
	}
}