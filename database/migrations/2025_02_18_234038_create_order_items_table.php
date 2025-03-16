<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderItemsTable extends Migration {

	public function up()
	{
		Schema::create('order_items', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('quantity');
			$table->decimal('price');
			$table->text('special_request')->nullable();
			$table->integer('order_id')->unsigned();
			$table->integer('menu_item_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('order_items');
	}
}