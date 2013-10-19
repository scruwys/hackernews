<?php namespace Services\Validators;

class Comment extends Validator {
	
	protected $rules = [];

	protected $messages = [];

	public function onCreate()
	{
		$this->rules = [
			'body' => 'required'
		];

		return $this;
	}
}