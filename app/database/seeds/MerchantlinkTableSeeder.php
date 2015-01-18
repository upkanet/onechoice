<?php

class MerchantlinkTableSeeder extends Seeder {

	public function run()
	{
		DB::table('merchantlinks')->delete();
		Merchantlink::create(array(
			'product_id' => '1',
			'merchant' => 'Amazon',
			'link' => 'http://www.amazon.fr/gp/product/B00I3WQKUG/ref=as_li_qf_sp_asin_il_tl?ie=UTF8&camp=1642&creative=6746&creativeASIN=B00I3WQKUG&linkCode=as2&tag=lone06-21&linkId=BNRZE7DJFZ6D4IEX'
		));
	}
	
}