<?php

class Order extends Eloquent {

	protected $table = 'orders';
	
	public function pizzas()
	{
		return $this->belongsToMany('Pizza');
	}
	
	public function users()
	{
		return $this->belongsToMany('User');
	}
}