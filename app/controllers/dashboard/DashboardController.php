<?php

use Sunra\PhpSimple\HtmlDomParser;

class DashboardController extends BaseController{

	public function showDashboard(){
		$categories = Category::all();
		$rconnector = Rconnector::find('2');

		//$products = $this->getProducts($rconnector);

		return View::make('dashboard.main')
		//	->with('products', $products)
			->with('categories', $categories);
	}

	private function getProducts($rconnector)
	{
		$products = array();
		$products_names = array();
		$products_prices = array();
		$products_ratings = array();

		$html = HtmlDomParser::file_get_html($rconnector->prod_list_url);

		$codeFE = '$codeList = '.$rconnector->prod_list_code.';';
		eval($codeFE);
		$i = 0;

		foreach ($codeList as $element) {
			$codeinFEn = '$products_names[] = '.$rconnector->prod_name_code.';';
			eval($codeinFEn);
			$codeinFEp = '$products_prices[] = '.$rconnector->prod_price_code.';';
			eval($codeinFEp);
			$codeinFEr = '$products_ratings[] = '.$rconnector->prod_rating_code.';';
			eval($codeinFEr);
			$i++;
		}

		while ($i > 0) {
			$products[] = array('name' => $products_names[$i-1],
								'price' => $products_prices[$i-1],
								'rating' => $products_ratings[$i-1]);
			$i--;
		}

		return $products;
	}

	

}