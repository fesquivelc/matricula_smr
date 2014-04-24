<?php

class Cronograma extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	public $timestamps = false;
	protected $table = 'cronogramas';

	public function anioacademico(){
		return $this->belongsTo('AnioAcademico','anioacademico_id');
	}
}