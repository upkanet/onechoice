<?php

class Product extends Eloquent{
	protected $table = 'products';

	public function category()
	{
		return $this->belongsTo('Category');
	}
}