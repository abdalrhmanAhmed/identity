<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProfessionsTable extends Migration {

	public function up()
	{
		Schema::create('professions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('professions');
	}
}