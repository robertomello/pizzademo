<?php

class OrderController extends BaseController {

	public function getIndex()
	{
		$prettyOrders = array();
		$total = 0;
		
		if(is_array(Session::get('orders')))
		{
			$keys = array_keys(Session::get('orders'));
			
			$orders = Session::get('orders');
			
			foreach (Pizza::whereIn('id', $keys)->get() as $pizza)
			{			
				$sub_total = $orders[$pizza->id] * $pizza->price;

				$prettyOrders[] = array(
					'id'		=> $pizza->id,
					'name'		=> $pizza->name,
					'price'		=> $pizza->price,
					'count'		=> $orders[$pizza->id],
					'sub_total'	=> $sub_total
				);

				$total += $sub_total;
			}

			Session::put('total', $total);
		}
		
		return View::make('order/index')->with('orders', $prettyOrders)->with('total', $total);
	}
	
	public function postIndex()
	{
		if(Input::get('mehet') == 1) {
			$orders = Session::get('orders');
			
			// uj rendeles
			$order = new Order(array('user_id' => Auth::user()->id, 'total' => Session::get('total')));
			$order->save();
			$orderId = $order->getKey();
			
			// pivot tabla
			foreach($orders as $pizza_id => $count)
			{
				$pivotFields = array(
					'count'			=> $count,
					'created_at'	=> new DateTime,
					'updated_at'	=> new DateTime,
				);
				
				$ordered = Order::find($orderId)->pizzas()->attach($pizza_id, $pivotFields);
			}
			
			Session::forget('orders');
			return Redirect::to('/')->with('success', 'Rendelés felvéve!');
		} else {
			return Redirect::to('/')->with('error', 'HAXX!');
		}
	}
	
	public function getClear()
	{
		Session::forget('orders');
		return Redirect::to('/')->with('success', 'Sikeresen ürítetted a kosarad!');
	}

}