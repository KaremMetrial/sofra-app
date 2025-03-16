<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommissionsTable extends Migration {

	public function up()
	{
		Schema::create('commissions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('total_sales');
			$table->decimal('commission_fee');
			$table->decimal('amount_paid');
			$table->decimal('remaining_due');
			$table->string('transfer_reference');
			$table->text('note');
			$table->integer('restaurant_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('commissions');
	}
}