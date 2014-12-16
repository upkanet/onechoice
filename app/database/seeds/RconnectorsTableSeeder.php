<?php

class RconnectorsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('rconnectors')->delete();
		Rconnector::create(array(
			'name' => 'C | Net',
			'prod_list_url' => 'http://www.cnet.com/topics/tvs/best-tvs/',
			'prod_list_code' => '$html->find(\'div.prodDetail\')',
			'prod_name_code' => '$element->find(\'h2\',0)->plaintext',
			'prod_price_code' => '$element->find(\'a.price\',0)->plaintext',
			'prod_rating_code' => '$element->find(\'span.rating\',0)->plaintext',
			'category_id' => '1'
		));

		Rconnector::create(array(
			'name' => 'Engadget',
			'prod_list_url' => 'http://www.engadget.com/reviews/hdtvs-televisions/',
			'prod_list_code' => '$html->find(\'ul.product-grid\',0)->find(\'li\')',
			'prod_name_code' => '$element->find(\'a.product-name\',0)->title',
			'prod_price_code' => '0',
			'prod_rating_code' => '$element->find(\'span.product-scores\',0)->plaintext',
			'category_id' => '1'
		));
	}

}