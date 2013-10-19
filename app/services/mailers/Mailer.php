<?php namespace Services\Mailers;

class InvalidContactInfoException extends \Exception {};

abstract class Mailer {

	protected $to;
	
	protected $email;
	
	protected $subject;
	
	protected $view;
	
	protected $data = [];

	public function __construct($user)
	{
		if (! is_object($user) ) 
		{
			throw new InvalidContactInfoException('Please pass a valid user object.');
		}

		$this->data = $user->toArray();
		$this->to = $user->first_name;
		$this->email = $user->email;
	}

	public function deliver()
	{
		return \Mail::send($this->view, $this->data, function($message)
		{
			$message->to($this->email, $this->to)
					->subject($this->subject);
		});
	}
}