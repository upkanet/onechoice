<?php

class Category extends Eloquent{
	protected $table = 'categories';
	protected $appends = array('product');

	public function rooms()
	{
		return $this->belongsToMany('Room');
	}

	public function products()
	{
		return $this->hasMany('Product');
	}

	public function rconnectors()
	{
		return $this->hasMany('Rconnector');
	}

	public function delete()
	{
		$this->products()->delete();
		$this->rconnectors()->delete();

		return parent::delete();
	}

	public function getProductAttribute()
	{
		$product = Product::active()->where('category_id','=',$this->id)->firstOrFail();
		return $product;
	}

}