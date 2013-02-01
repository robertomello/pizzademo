<?php

class Pizza extends Eloquent {

	protected $table = 'pizzas';
	
	public function toppings()
	{
		return $this->belongsToMany('Topping');
	}
	
	public function orders()
	{
		return $this->belongsToMany('Order');
	}
	
	public function listToppings()
	{
		$tmp = array();
		
		foreach ($this->toppings()->get() as $topping)
		{
			$tmp[] = $topping->name;
		}
		
		return implode(', ', $tmp);
	}

}