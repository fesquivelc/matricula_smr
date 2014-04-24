<?php

class Departamento extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departamentos';
	public $timestamps = false;

	public function provincias(){
		return $this->hasMany('Provincia','departamento_id');
	}

}