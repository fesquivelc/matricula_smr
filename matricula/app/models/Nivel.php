<?php
class Nivel extends Eloquent
{
	protected $table='niveles';

	public function grados()
	{
		return $this->hasMany('Grado','nivel_id');
	}
}	
?>