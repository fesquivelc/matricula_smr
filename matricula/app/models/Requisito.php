<?php
class Requisito extends Eloquent
{
	public function estudianteRequisito()
	{
		return $this->hasMany('RequisitoEstudiante','requisito_id');
	}
}
?>