<?php
class Requisito extends Eloquent
{
	public $timestamps = false;
	public function estudianteRequisito()
	{
		return $this->hasMany('RequisitoEstudiante','requisito_id');
	}
}
?>