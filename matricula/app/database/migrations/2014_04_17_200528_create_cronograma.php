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
		Schema::create('cronogramas', function(Blueprint $table)
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
				$table->string('nombre')->unique();
				$table->longtext('descripcion')->nullable();
				$table->string('cond_estudiante','1'); //NUEVO O ANTIGUO POR EJM. LA PARTIDA ES PARA EST. NUEVOS
				$table->boolean('vigente')->default(true); //SI ES QUE AUN SE APLICA ESTE TIPO DE DOCUMENTO
			});

		Schema::create('estudiante_requisito', function(Blueprint $table)
			{
				$table->bigincrements('id');
				$table->string('estudiante_dni');
				$table->unsignedInteger('requisito_id');
				$table->unsignedBigInteger('anioacademico_id');
				$table->boolean('presento')->default(false);
				$table->string('detalle')->nullable();

				$table->foreign('anioacademico_id')->references('id')->on('aniosacademicos')->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('estudiante_dni')->references('dni')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('requisito_id')->references('id')->on('requisitos')->onUpdate('cascade')->onDelete('cascade');

				$table->unique('estudiante_dni','requisito_id','anioacademico_id');
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
		Schema::drop('cronogramas');
	}

}
