<?php

use Illuminate\Database\Migrations\Migration;

class CreatePivotTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_pizza', function($table)
		{
			$table->integer('order_id')->unsigned();
			$table->integer('pizza_id')->unsigned();
			$table->integer('count')->unsigned()->default(0);
			$table->timestamps();
		});
		
		Schema::create('pizza_topping', function($table)
		{
			$table->integer('pizza_id')->unsigned();
			$table->integer('topping_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_pizza');
		Schema::drop('pizza_topping');
	}

}