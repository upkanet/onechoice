<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');
			$table->string('name');
			$table->string('permalink')->unique();

			//Arguments
			$table->string('arg1');
			$table->string('arg2');
			$table->string('arg3');
			$table->string('arg4');
			$table->string('arg5');
			$table->string('arg6');
			$table->string('arg7');

			//Articles
			$table->string('art1');
			$table->string('art1_url');
			$table->string('art2');
			$table->string('art2_url');
			$table->string('art3');
			$table->string('art3_url');

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
		Schema::drop('products');
	}

}
