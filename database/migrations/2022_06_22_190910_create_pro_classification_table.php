<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProClassificationTable extends Migration {

	public function up()
	{
		Schema::create('pro_classification', function(Blueprint $table) {
			$table->increments('id');
			$table->string('pro_classification_name', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pro_classification');
	}
}