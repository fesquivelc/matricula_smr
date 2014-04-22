<?php

class RequisitoEstudiante extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estudiante_requisito';

	public $timestamps = false;

	public function estudiante(){
		return $this->belongsTo('Estudiante','estudiante_dni');
	}

	public function anioAcademico(){
		return $this->belongsTo('AnioAcademico','anioacademico_id');
	}

	public function requisito(){
		return $this->belongsTo('Requisito','requisito_id');
	}
}