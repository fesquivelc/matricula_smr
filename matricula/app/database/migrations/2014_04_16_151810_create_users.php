<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		// Schema::create('roles', function(Blueprint $table)
		// {
		// 	$table->increments('id');
		// 	$table->string('nombre','45');
		// 	$table->longtext('descripcion')->nullable();
		// });

		Schema::create('users', function(Blueprint $table)
		{
			$table->bigincrements('id');
			$table->string('username','30')->unique();
			$table->string('password');
			$table->string('email')->unique();
			$table->string('remember_token','100')->nullable();
			$table->boolean('activo')->default('false');
			$table->boolean('admin')->default('false');
			// $table->unsignedInteger('rol_id');			
			$table->timestamps();

			// $table->foreign('rol_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
		});		

		

		// Schema::create('users_roles', function(){
		// 	$table->bigincrements('id');
		// 	$table->unsignedInteger('rol_id');
		// 	$table->unsignedBigInteger('user_id');

		// 	$table->foreign('rol_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
		// 	$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

		// });

		// Schema::create('urls', function(Blueprint $table){
			
		// });
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		
		Schema::drop('users');
		Schema::drop('roles');
	}

}
