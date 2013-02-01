<?php

use Illuminate\Database\Migrations\Migration;

class CreateToppingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('toppings', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('description')->nullable();
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
		Schema::drop('toppings');
	}

}