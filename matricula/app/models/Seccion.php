<?php
class Seccion extends Eloquent
{
	protected $table='secciones';
	public $timestamps = false;

	public function grado()
	{
		return $this->belongsTo('Grado','grado_id');
	}

	public function matriculas(){
		return $this->hasMany('Matricula','seccion_id');
	}
}

?>