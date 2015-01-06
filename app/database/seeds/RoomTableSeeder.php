<?php

class RoomTableSeeder extends Seeder {

	public function run(){
		DB::table('rooms')->delete();
		DB::table('category_room')->delete();
		$room = Room::create([
			'name' => 'Living Room',
			'permalink' => 'living_room'
		]);
		$room->categories()->attach(1);
		$room->categories()->attach(2);
		$room = Room::create([
			'name' => 'Office',
			'permalink' => 'office'
		]);
		$room->categories()->attach(2);
	}
}