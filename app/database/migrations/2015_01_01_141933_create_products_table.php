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
			$table->string('name')->required();
			$table->string('permalink')->unique()->required();

			//Picture
			$table->string('img_path')->required();

			//Arguments
			$table->string('arg1')->required();
			$table->string('arg2')->required();
			$table->string('arg3')->required();
			$table->string('arg4')->required();
			$table->string('arg5')->required();
			$table->string('arg6')->required();
			$table->string('arg7')->required();

			//Articles
			$table->string('art1');
			$table->string('art1_url');
			$table->string('art2');
			$table->string('art2_url');
			$table->string('art3');
			$table->string('art3_url');

			//Active
			$table->boolean('isActive')->default(0);

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
