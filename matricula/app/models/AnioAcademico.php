<?php

class AnioAcademico extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aniosacademicos';

	public function requisitosEstudiante(){
		return $this->hasMany('RequisitoEstudiante','anioacademico_id');
	}

	public function matriculas(){
		return $this->hasMany('Matricula','anioacademico_id');
	}

	public function 
}