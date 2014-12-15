<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'email' => 'jeandamien.louise@gmail.com',
			'password' => Hash::make('jaydee'),
			'isAdmin' => '1'
		));
	}
}