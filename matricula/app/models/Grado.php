<?php
class Grado extends Eloquent
{
	protected $table='grados';
	public $timestamps = false;

	public function secciones()
	{
		return $this->hasMany('Seccion','grado_id');
	}

	public function nivel()
	{
		return $this->belongsTo('Nivel','nivel_id');
	}

	public function gradoAnterior()
	{
		return $this->hasOne('Grado','gradoant_id');
	}
}
?>