<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcPatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_patients', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('first_name', 70);
			$table->string('last_name', 70);
			$table->string('phone_number', 20);
			$table->boolean('sex');
			$table->date('birth_date');
			$table->string('email', 35);
			$table->integer('idoc_type')->index('fk_idoc_type');
			$table->string('idoc_code', 25);
			$table->bigInteger('sys_user')->unsigned()->nullable()->index('fk_sys_user');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_patients');
	}

}
