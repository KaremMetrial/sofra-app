<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration {

	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('image')->nullable();
			$table->text('description')->nullable();
			$table->integer('preparation_time');
			$table->decimal('price');
			$table->integer('restaurant_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('menu_items');
	}
}