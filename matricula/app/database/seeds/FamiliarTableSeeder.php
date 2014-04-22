<?php

class FamiliarTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Familiar::create(array(
				'dni' => '26690226',
				'appaterno' => 'ESQUIVEL',
				'apmaterno' => 'MARIÑOS',
				'nombres' => 'WALTER',
				'fnacimiento' => '1956-02-21',
				'ginstruccion' => 'UN',
				'ocupacion' => 'ING. AGRONOMO',
				'estado' => 'V',								
			));

		Familiar::create(array(
				'dni' => '18033904',
				'appaterno' => 'CUENCA',
				'apmaterno' => 'PALACIOS',
				'nombres' => 'TOMASA FLOR',
				'fnacimiento' => '1957-12-21',
				'ginstruccion' => 'UN',
				'ocupacion' => 'CONTADOR PÚBLICO',
				'estado' => 'V',				
			));
		Familiar::create(array(
				'dni' => '18033904',
				'appaterno' => 'ESQUIVEL',
				'apmaterno' => 'CUENCA',
				'nombres' => 'FRANCIS PAUL',
				'fnacimiento' => '1990-01-31',
				'ginstruccion' => 'BA',
				'ocupacion' => 'PROGRAMADOR',
				'estado' => 'V',				
				'user_id' => '1',
			));
	}

}