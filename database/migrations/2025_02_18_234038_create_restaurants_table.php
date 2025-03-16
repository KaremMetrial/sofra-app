<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('logo')->nullable();
			$table->string('images')->nullable();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('phone_number')->unique();
			$table->string('whatsapp_number')->unique();
			$table->text('description')->nullable();
			$table->decimal('min_order_amount');
			$table->decimal('delivery_fee');
			$table->decimal('rating', 3,2)->default('0.00');
			$table->time('open_time');
			$table->time('close_time');
			$table->string('location')->nullable();
			$table->boolean('is_active')->default(true);
			$table->integer('city_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}