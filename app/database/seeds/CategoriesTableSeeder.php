<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();
		Category::create(array(
			'name' => 'TV'
		));
		Category::create(array(
			'name' => 'PC'
		));
	}
	
}