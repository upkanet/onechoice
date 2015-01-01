<?php

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('products')->delete();
		Product::create(array(
			'category_id' => 1,
			'name' => 'Sony BZQ47',
			'permalink' => 'sony_bzq47',
			'img_path' => '/img/products/20150101213627.png',
			'arg1' => 'It is good',
			'arg2' => 'Lorem ipsum et caetera',
			'arg3' => 'Sum qui pro que',
			'arg4' => 'Alea jacta est',
			'arg5' => 'In nomine partis et',
			'arg6' => 'Corum nostrum',
			'arg7' => 'Tu quo que mi fili',
			'art1' => 'C Net Review',
			'art1_url' => 'http://www.cnet.com/products/samsung-pn64f8500/',
			'art2' => 'Endgadget Review',
			'art2_url' => 'http://www.engadget.com/products/samsung/e6500-series/',
			'art3' => 'Gizmodo Review',
			'art3_url' => 'http://gizmodo.com/4k-tv-throwdown-part-one-how-the-sharp-ud27-stacks-up-1672424909',
			'isActive' => 1,
		));
	}
}