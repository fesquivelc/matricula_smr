<?php

class Cronograma extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cronogramas';
	public $timestamps = false;

	public function anioacademico(){
		return $this->belongsTo('AnioAcademico','anioacademico_id');
	}
}