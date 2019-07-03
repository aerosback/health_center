<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcSpecDoctorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_spec_doctors', function(Blueprint $table)
		{
			$table->foreign('doctor_id', 'fk_doctor')->references('id')->on('hc_doctors')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('specialty_id', 'fk_specialty')->references('id')->on('hc_specialties')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_spec_doctors', function(Blueprint $table)
		{
			$table->dropForeign('fk_doctor');
			$table->dropForeign('fk_specialty');
		});
	}

}
