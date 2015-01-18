<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'email' => 'jeandamien.louise@gmail.com',
			'password' => '$2y$10$XahZlDZ016ey7FVWn2TX9ew9AJhD9ygFkuw0amfTGyH1vsb5xJt4i',
			'isAdmin' => '1'
		));
	}
}