<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcPatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_patients', function(Blueprint $table)
		{
			$table->foreign('idoc_type', 'fk_idoc_type')->references('id')->on('hc_doc_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('sys_user', 'fk_sys_user')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_patients', function(Blueprint $table)
		{
			$table->dropForeign('fk_idoc_type');
			$table->dropForeign('fk_sys_user');
		});
	}

}
