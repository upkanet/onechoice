<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();
		Category::create(array(
			'name' => 'TV',
			'permalink' => 'tv'
		));
		$category = Category::create(array(
			'name' => 'PC',
			'permalink' => 'pc'
		));
	}
	
}