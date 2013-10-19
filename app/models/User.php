<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Timestamp fields are used by the model.
	 * @var boolean
	 */
    public $timestamps = true;

	protected $guarded = [];

	public static $rules = [];

	public function stories()
	{
		return $this->hasMany('Story');
	}

	public function hasCredentials($pwd)
	{
		return Hash::check($pwd, $this->password);
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getStoryCount()
	{
		return Story::where('author', '=', Auth::user()->username)->count();
	}

}
