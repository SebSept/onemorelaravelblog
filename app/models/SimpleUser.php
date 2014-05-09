<?php

use Illuminate\Auth\UserInterface;

class SimpleUser implements UserInterface 
{
	private $password;
	private $id = 'seb';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->id;
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return Hash::make('pass');
	}

	public function getRememberToken() {
		return null;
	}

	public function setRememberToken($value) {
	}

	public function getRememberTokenName() {
		return null;
	}
}
