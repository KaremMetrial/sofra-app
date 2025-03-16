<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('payment_method')->default('cash_on_delivery');
			$table->string('transaction_id')->unique();
			$table->string('status')->default('pending');
			$table->integer('order_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}
