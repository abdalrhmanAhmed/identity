<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateWorkPlaceTable extends Migration {

	public function up()
	{
		Schema::create('work_place', function(Blueprint $table) {
			$table->increments('id');
			$table->string('work_name', 255);
			$table->tinyInteger('state_id')->unsigned();
			$table->tinyInteger('locality_id')->unsigned();
			$table->string('adminstrative_unit', 255);
			$table->string('public_admins_unit', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('work_place');
	}
}