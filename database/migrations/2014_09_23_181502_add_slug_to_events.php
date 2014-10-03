<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function(Blueprint $table)
		{
			$table->string('slug')->unique();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events',function(Blueprint $table)
			{
				$table->dropcolumn('slug');
			});
	}

}
