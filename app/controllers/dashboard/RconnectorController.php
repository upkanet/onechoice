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

	private function getAvgMax(array $products_list, $param)
	{
		$avg = 0;
		$max = 0;

		foreach ($products_list as $product) {
			$avg += $product[$param];
			if($product[$param] > $max){
				$max = $product[$param];
			}
		}

		$avg = round($avg / count($products_list),2);
		
		return ["avg" => $avg, "max" => $max];
	}

	private function addScore(array $products_list)
	{
		$new_products_list = array();
		$math['price'] = $this->getAvgMax($products_list,'price');
		$math['rating'] = $this->getAvgMax($products_list,'rating');

		foreach ($products_list as $product) {
			$new_product = $product;
			if($product['price'] != 0){
				$pricePart = round(exp( -1 * abs( $product['price'] - $math['price']['avg'] ) / $math['price']['avg'] ),2);
				$ratingPart = round($product['rating'] / $math['rating']['max'],2);

				$new_product['score'] = 
				round( ($ratingPart + $pricePart) / 2 ,2 ) * 100;	
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

		$math['price'] = $this->getAvgMax($products_list,'price');
		$math['rating'] = $this->getAvgMax($products_list,'rating');

		return View::make('dashboard.products_list')
				->with('avg_price', $math['price']['avg'])
				->with('avg_rating', $math['rating']['avg'])
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

	public function edit($id){
		$rconnector = Rconnector::FindOrFail($id);
		return View::make('dashboard.edit_connector')
				->with('rconnector', $rconnector);
	}

	public function update($id)
	{
		$rconnector = Rconnector::find(Input::get('id'));

		$rconnector->name = Input::get('name');
		$rconnector->prod_list_url = Input::get('prod_list_url');
		$rconnector->prod_list_code = Input::get('prod_list_code');
		$rconnector->prod_name_code = Input::get('prod_name_code');
		$rconnector->prod_price_code = Input::get('prod_price_code');
		$rconnector->prod_rating_code = Input::get('prod_rating_code');

		if($rconnector->save()){
			return Redirect::route('dashboard')->with('success', 'Connector updated successfully');
		}
		else{
			return Redirect::route('dashboard')->with('fail', 'Error while updating connector');
		}

	}

	public function destroy($id)
	{
		$result = ['success' => 0];
		if(Rconnector::destroy($id)){
			$result['success'] = 1;
		}
		return $result;
	}

	public function tryit($id)
	{
		$rconnector = Rconnector::find($id);
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
		echo 'Names';
		var_dump($products_names);
		echo 'Prices';
		var_dump($products_prices);
		echo 'Ratings';
		var_dump($products_ratings);

	}

}