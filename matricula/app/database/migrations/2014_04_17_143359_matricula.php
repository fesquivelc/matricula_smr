<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matricula extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('familiares', function(Blueprint $table){
			$table->string('dni','8');
			$table->string('appaterno','200');
			$table->string('apmaterno','200');
			$table->string('nombres','200');
			$table->date('fnacimiento');
			$table->string('ginstruccion','2');
			$table->string('ocupacion','60');
			$table->estado('estado','1');
			$table->bigInteger('user_id')->nullable();
			$table->primary('dni');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

		});

		Schema::create('estudiantes', function(Blueprint $table){
			$table->string('dni','8');
			$table->string('appaterno','200');
			$table->string('apmaterno','200');
			$table->string('nombres','200');
			$table->date('fnacimiento');
			$table->estado('estado','1');
			$table->primary('dni');
			$table->bigInteger('user_id')->nullable();			
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

		});

		Schema::create('fichas', function(Blueprint $table){
			$table->bigincrements('id');
			$table->string('estudiante_dni','8');
			$table->string('plengua','45');
			$table->string('slengua','45');
			$table->string('ginstruccion','2');			
			$table->string('religion');
			$table->string('tipo_nacimiento','1');
			$table->longtext('observaciones');
			$table->string('tipo_discapacidad','2');
			$table->integer('nhermanos');
			$table->integer('lugarhermanos');
			$table->string('direccion');
			$table->string('telefono','9');					
			$table->foreign('estudiante_dni')->references('dni')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');			
		});

		Schema::create('estudiantes_familiares', function(Blueprint $table)
		{
			$table->bigincrements('id');
			$table->string('estudiante_dni','8');
			$table->string('familiar_dni','8');
			$table->boolean('vcestudiante')->default('true');
			$table->string('parentesco','2');
			$table->boolean('esapoderado')->default('false');
			$table->foreign('estudiante_dni')->references('dni')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('familiar_dni')->references('dni')->on('familiares')->onUpdate('cascade')->onDelete('cascade');
		});

		Schema::create('matricula', function(Blueprint $table)
		{
			$table->bigincrements('id');
			$table->datetime('fecha');
			$table->string('estado','1');
			$table->unsignedBigInteger('estudiante_dni');
			$table->unsignedBigInteger('anio_id');
			$table->unsignedBigInteger('seccion_id');
			$table->unsignedBigInteger('apoderado_dni');


			$table->foreign('estudiante_dni')->references('dni')->on('estudiantes')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('apoderado_dni')->references('dni')->on('familiares')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('anio_id')->references('id')->on('aniosacademicos')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade')->onUpdate('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('matricula');
		Schema::drop('estudiantes_familiares');
		Schema::drop('familiares');
		Schema::drop('fichas');
		Schema::drop('estudiantes');
	}

}