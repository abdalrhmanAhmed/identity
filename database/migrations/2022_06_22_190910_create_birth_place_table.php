<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateBirthPlaceTable extends Migration {

	public function up()
	{
		Schema::create('birth_place', function(Blueprint $table) {
			$table->increments('id');
			$table->string('birth_palce_name', 255);
			$table->tinyInteger('state')->unsigned();
			$table->tinyInteger('locality')->unsigned();
			$table->string('adminstrative_unit', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('birth_place');
	}
}
