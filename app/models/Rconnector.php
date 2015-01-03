<?php

class Rconnector extends Eloquent{
	protected $table = 'rconnectors';

	public function category()
	{
		return $this->belongsTo('Category');
	}
}