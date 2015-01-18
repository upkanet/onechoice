<?php

class Product extends Eloquent{
	protected $table = 'products';

	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function rooms()
	{
		return $this->category->rooms()->get();
	}

	public function merchantlink()
	{
		return $this->hasOne('Merchantlink');
	}

	public function scopeActive($query)
	{
		return $query->where('isActive','=',1);
	}
}