<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('order_number')->unique();
			$table->decimal('total_price');
			$table->string('status')->default('pending');
			$table->string('address');
			$table->text('note')->nullable();
			$table->decimal('delivery_fee');
			$table->decimal('grand_total');
			$table->string('payment_method')->default('cash_on_delivery');
			$table->integer('user_id')->unsigned();
			$table->integer('restaurant_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
