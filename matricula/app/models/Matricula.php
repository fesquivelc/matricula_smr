<?php

class Matricula extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'matriculas';

	public function estudiante(){
		return $this->belongsTo('Estudiante','estudiante_dni');
	}

	public function anioacademico(){
		return $this->belongsTo('AnioAcademico','anioacademico_id');
	}

	public function apoderado(){
		return $this->belongsTo('Familiar','apoderado_dni');		
	}

	public function seccion(){
		return $this->belongsTo('Seccion','seccion_id');
	}
}