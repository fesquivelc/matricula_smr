<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronograma extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */	
	public function up()
	{
		//
		Schema::create('cronograma', function(Blueprint $table)
			{
				$table->bigincrements('id');
				$table->unsignedBigInteger('anioacademico_id');
				$table->date('finicio');
				$table->date('ffin');
				$table->date('finicioseguro');
				$table->date('ffinseguro');

				$table->foreign('anioacademico_id')->references('id')->on('aniosacademicos')->onUpdate('cascade')->onDelete('cascade');
			});

		Schema::create('requisitos', function(Blueprint $table)
			{
				$table->increments('id');
				$table->longtext('descripcion');
				$table->string('cond_estudiante','1'); //NUEVO O ANTIGUO POR EJM. LA PARTIDA ES PARA EST. NUEVOS
				$table->boolean('vigente'); //SI ES QUE AUN SE APLICA ESTE TIPO DE DOCUMENTO
			});

		Schema::create('estudiante_requisito', function(Blueprint $table)
			{
				$table->bigincrements('id');
				$table->string('estudiante_dni');
				$table->unsignedInteger('requisito_id');
				$table->unsignedBigInteger('anioacademico_id');
				$table->boolean('presento');
				$table->string('motivo');

				$table->foreign('anioacademico_id')->references('id')->on('aniosacademicos')->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('estudiante_dni')->references('dni')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('requisito_id')->references('id')->on('requisitos')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('estudiante_requisito');
		Schema::drop('requisitos');
		Schema::drop('cronograma');
	}

}
