<?php

class Ficha extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fichas';

	public function estudiante(){
		return $this->belongsTo('Estudiante','estudiante_dni');
	}

	public function distrito(){
		return $this->belongsTo('Distrito','distrito_id');
	}
}

?>