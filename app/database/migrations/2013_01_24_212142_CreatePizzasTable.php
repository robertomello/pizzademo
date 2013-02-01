<?php

use Illuminate\Database\Migrations\Migration;

class CreatePizzasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pizzas', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->integer('price')->unsigned();
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
		Schema::drop('pizzas');
	}

}