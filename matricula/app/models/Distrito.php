<?php

class Distrito extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'distritos';
	public $timestamps = false;

	public function provincia(){
		return $this->belongsTo('Provincia','provincia_id');
	}

	public function fichas(){
		return $this->hasMany('Ficha','distrito_id');
	}
}