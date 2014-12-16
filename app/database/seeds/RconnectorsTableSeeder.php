<?php

class RconnectorsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('rconnectors')->delete();
		Rconnector::create(array(
			'name' => 'C | Net',
			'prod_list_url' => 'http://www.cnet.com/topics/tvs/best-tvs/',
			'category_id' => '1'
		));
	}

}