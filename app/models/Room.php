<?php

class Room extends Eloquent{
	protected $table = 'rooms';

	public function categories(){
		return $this->belongsToMany('Category');
	}
}