<?php

class Topping extends Eloquent {

	protected $table = 'toppings';
	
	public function pizzas()
	{
		return $this->belongsToMany('Pizza');
	}
	
}