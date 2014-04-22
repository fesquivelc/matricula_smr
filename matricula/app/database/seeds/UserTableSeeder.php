<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create(array(
				'username' => 'fesquivelc',
				'password' => Hash::make('elhack'),
				'email' => 'fesquivelc@gmail.com',
				'activo' => '1',				
			));
	}

}