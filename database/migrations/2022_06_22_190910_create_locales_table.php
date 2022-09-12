<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateLocalesTable extends Migration {

	public function up()
	{
		Schema::create('locales', function(Blueprint $table) {
			$table->increments('id');
			$table->string('local_name', 255);
			$table->integer('state_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('locales');
	}
}