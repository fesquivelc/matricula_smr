<?php

class Deuda extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'deudas';
	public $timestamps = false;

	public function estudiante(){
		return $this->belongsTo('Estudiante','estudiante_dni');
	}
}