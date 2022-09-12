<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateStatesTable extends Migration {

	public function up()
	{
		Schema::create('states', function(Blueprint $table) {
			$table->increments('id');
			$table->string('state_name', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('states');
	}
}