<?php

class Product extends Eloquent{
	protected $table = 'products';

	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function scopeActivated($query)
	{
		return $query->where('isActive','=',1);
	}
}