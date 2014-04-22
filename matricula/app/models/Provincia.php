<?php

class Provincia extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'provincias';

	public function departamento(){
		return $this->belongsTo('Departamento','departamento_id');
	}

	public function distritos(){
		return $this->hasMany('Distrito','provincia_id');		
	}
}