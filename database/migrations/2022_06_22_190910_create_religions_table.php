<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateReligionsTable extends Migration {

	public function up()
	{
		Schema::create('religions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('religion_name', 255);
		});
	}

	public function down()
	{
		Schema::drop('religions');
	}
}