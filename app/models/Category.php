<?php

class Category extends Eloquent{
	protected $table = 'categories';

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

}