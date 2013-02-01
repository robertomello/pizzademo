<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	protected $table = 'users';

	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}
	
	public function orders()
	{
		return $this->belongsToMany('Order');
	}
	
	public function fullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

}