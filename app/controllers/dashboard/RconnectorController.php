<?php

use Sunra\PhpSimple\HtmlDomParser;

class RconnectorController extends BaseController{


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
			$products[] = array('rconnector' => $rconnector->name,
								'name' => $products_names[$i-1],
								'price' => $products_prices[$i-1],
								'rating' => $products_ratings[$i-1]);
			$i--;
		}

		return $products;
	}

	private function getAvgMean(array $products_list, $param)
	{
		$avg = 0;
		$mean = 0;

		foreach ($products_list as $product) {
			$avg += $product[$param];
			$mean += $product[$param] * $product[$param];
		}

		$avg = round($avg / count($products_list),2);
		$mean = round(sqrt(($mean/count($products_list) - $avg*$avg)),2);
		
		return ["avg" => $avg, "mean" => $mean];
	}

	private function addScore(array $products_list)
	{
		$new_products_list = array();
		$math['price'] = $this->getAvgMean($products_list,'price');
		$math['rating'] = $this->getAvgMean($products_list,'rating');

		$coeff = ['price' => 0.6, 'rating' => 0.4];

		foreach ($products_list as $product) {
			$new_product = $product;
			if($product['price'] != 0){
				$new_product['score'] = 
				round($coeff['rating'] * $product['rating']/$math['rating']['avg'] * $coeff['price'] * $math['price']['avg'] / abs($product['price'] - $math['price']['avg']),2);	
			}
			else{
				$new_product['score'] = 0;
			}
			$new_products_list[] = $new_product;
		}

		return $new_products_list;
	}

	private function cmpScore($a,$b){
		if ($a['score'] == $b['score']) {
			return 0;
		}
			return ($a['score'] > $b['score']) ? -1 : 1;
	}

	private function sortProducts(array $products_list)
	{
		$new_products_list = $this->addScore($products_list);

		uasort($new_products_list, array('RconnectorController', 'cmpScore'));

		return $new_products_list;

	}

	public function getAllProducts($ids){
		$products_list = array();
		$ids_list = explode(",",$ids);

		foreach ($ids_list as $id) {
			$rconnector = Rconnector::find($id);
			$products_list = array_merge($products_list,$this->getProducts($rconnector));
		}

		$products_list = $this->sortProducts($products_list);

		$math['price'] = $this->getAvgMean($products_list,'price');

		return View::make('dashboard.products_list')
				->with('avg_price', $math['price']['avg'])
				->with('products_list', $products_list);


	}

	public function create(){
		$category_id = Input::get('category_id');
		if(trim($category_id)=="") return 'First select a category';
		return View::make('dashboard.create_connector')
				->with('category_id', $category_id);
	}

	public function store(){

		//$validate = Validator::make(Input::all())


		$rconnector = new Rconnector();
		$rconnector->category_id = Input::get('category_id');
		$rconnector->name = Input::get('name');
		$rconnector->prod_list_url = Input::get('prod_list_url');
		$rconnector->prod_list_code = Input::get('prod_list_code');
		$rconnector->prod_name_code = Input::get('prod_name_code');
		$rconnector->prod_price_code = Input::get('prod_price_code');
		$rconnector->prod_rating_code = Input::get('prod_rating_code');

		if($rconnector->save()){
			return Redirect::route('dashboard')->with('success', 'Connector added successfully');
		}
		else{
			return Redirect::route('dashboard')->with('fail', 'Error while adding connector');
		}

	}

}