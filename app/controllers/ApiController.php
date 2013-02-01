<?php

class ApiController extends BaseController {

	public function getIndex()
	{
		return Response::json(array('test' => 'JSON', 'state' => 1));
	}
	
	public function getPizzas()
	{
		$retArr = array();
		
		foreach (Pizza::all() as $pizza)
		{
			$retArr[] = array(
				'name'		=> $pizza->name,
				'price'		=> $pizza->price,
				'toppings'	=> $pizza->listToppings()
			);
			
		}
		
		return Response::json($retArr);
	}

}