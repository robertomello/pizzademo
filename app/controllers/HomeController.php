<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		// feltetek
		$toppings = array();
		
		foreach (Topping::all() as $value)
		{
			$toppings[] = array(
				'id'		=> $value->id,
				'name'		=> $value->name
			);
		}
		
		// pizzak
		$pizzas = array();
		
		foreach (Pizza::all() as $value)
		{
			$pizzas[] = array(
				'id'		=> $value->id,
				'name'		=> $value->name,
				'toppings'	=> $value->listToppings(),
				'price'		=> $value->price
			);
		}
		
		// view generalas
		return View::make('hello')->with('toppings', $toppings)->with('pizzas', $pizzas);
	}
	
	public function postIndex()
	{
		$orders = array();
		
		foreach (Input::all() as $id => $number)
		{
			
			// csak a pizzak erdekelnek, ezeken belul is azok, amikbol legalabb
			// egyet tettek a kosarba
			if (strstr($id, 'pizza') && $number > 0)
			{				
				$arr = explode('_', $id);
				$orders[$arr[1]] = $number;
			}
		}
		
		Session::put('orders', $orders);
		
		return Redirect::to('/')->with('success', Lang::get('general.been_put_to_cart'));
	}

}