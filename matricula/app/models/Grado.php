<?php
class Grado extends Eloquent
{
	protected $table='grados';

	public function secciones()
	{
		return $this->hasMany('Seccion','grado_id');
	}

	public function niveles()
	{
		return $this->belongsTo('niveles','nivel_id');
	}
}
?>