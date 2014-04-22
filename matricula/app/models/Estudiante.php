<?php

class Estudiante extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estudiantes';
	protected $primaryKey = 'dni';

	public function familiares(){
		return $this->belongsToMany('Profesor','estudiantes_familiares','estudiante_dni','familiar_dni');
	}

	public function ficha(){
		return $this->hasOne('Ficha','estudiante_dni');
	}

	public function deudas(){
		return $this->hasMany('Deuda','estudiante_dni');
	}

	public function matriculas(){
		return $this->hasMany('Matricula','estudiante_dni');
	}

	public function requisitosEstudiante(){
		return $this->hasMany('RequisitoEstudiante','estudiante_dni');
	}
}