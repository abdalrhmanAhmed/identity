<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCountryBirthsTable extends Migration {

	public function up()
	{
		Schema::create('country_births', function(Blueprint $table) {
			$table->increments('id');
			$table->string('c_name', 255);
			$table->integer('s_key');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('country_births');
	}
}