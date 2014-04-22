<?php

class Familiar extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'familiares';
	protected $primaryKey = 'dni';

	public function estudiantes(){
		return $this->belongsToMany('Estudiante','estudiantes_familiares','familiar_dni','estudiante_dni')->withPivot('vcestudiante','parentesco','esapoderado');
	}

	public function usuario(){
		return $this->belongsTo('Usuario','usuario_id');
	}

}