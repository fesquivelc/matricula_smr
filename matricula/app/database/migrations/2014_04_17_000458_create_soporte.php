<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoporte extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departamentos', function(Blueprint $table){
			$table->increments('id');	
			$table->string('nombre','50');
			$table->integer('idPais');
			$table->string('codigo','2');
		});

		Schema::create('provincias', function(Blueprint $table){
			$table->increments('id');
			$table->string('nombre','200');
			$table->string('codigo','2');
			$table->unsignedInteger('departamento_id');
			$table->foreign('departamento_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');			
		});

		Schema::create('distritos', function(Blueprint $table){
			$table->increments('id');
			$table->string('nombre','200');
			$table->string('codigo','2');
			$table->unsignedInteger('provincia_id');
			$table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');			
		});

		Schema::create('aniosacademicos', function(Blueprint $table){
			$table->bigincrements('id');
			$table->string('anio','4');
			$table->date('finicioclases');
			$table->date('ffinclases');
			$table->longtext('denominacion');			
		});

		Schema::create('niveles', function(Blueprint $table){
			$table->bigincrements('id');
			$table->string('nombre','200');			
		});

		Schema::create('grados', function(Blueprint $table)
		{
			$table->bigincrements('id');
			$table->string('descripcion','200');
			$table->unsignedBigInteger('nivel_id');
			$table->foreign('nivel_id')->references('id')->on('niveles')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::create('secciones', function(Blueprint $table)
		{
			$table->bigincrements('id');
			$table->string('descripcion','45');
			$table->integer('capacidad');
			$table->unsignedBigInteger('grado_id');			
			$table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade')->onUpdate('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('secciones');
		Schema::drop('grados');
		Schema::drop('niveles');
		Schema::drop('distritos');
		Schema::drop('provincias');
		Schema::drop('departamentos');
	}

}
