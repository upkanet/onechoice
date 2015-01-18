<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantlinks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchantlinks', function(Blueprint $table){
			$table->increments('id');
			$table->integer('product_id')->references('id')->on('products');
			$table->string('merchant')->required();
			$table->string('link')->required();

			//Timestamps
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
		Schema::drop('merchantlinks');
	}

}
