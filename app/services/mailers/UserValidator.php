<?php namespace Services\Mailers;

class UserValidator extends Mailer {

	public function accountActivation()
	{
		$this->subject = 'Active your Rideless account';
		$this->view = 'emails.user.activate';

		return $this;
	}

	public function welcome()
	{
		$this->subject = 'Welcome to Rideless!';
		$this->view = 'emails.user.welcome';

		return $this;
	}
}