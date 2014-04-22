<?php

class EstudianteTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$silvana = Estudiante::create(array(
			'dni' => '73689937',
			'appaterno' => 'ESQUIVEL',
			'apmaterno'	=> 'CUENCA',
			'nombres' => 'FLOR SILVANA',
			'fnacimiento' => '1994-06-28',
			'estado' => 'D',					
		));

		
	}

}