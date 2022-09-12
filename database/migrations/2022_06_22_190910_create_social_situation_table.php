<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSocialSituationTable extends Migration {

	public function up()
	{
		Schema::create('social_situation', function(Blueprint $table) {
			$table->increments('id');
			$table->string('s_name', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('social_situation');
	}
}