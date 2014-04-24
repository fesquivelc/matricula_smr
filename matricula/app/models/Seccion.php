<?php
class Seccion extends Eloquent
{
	protected $table='secciones';
	public $timestamps = false;

	public function grados()
	{
		return $this->belongsTo('Grado','grado_id');
	}
}

?>