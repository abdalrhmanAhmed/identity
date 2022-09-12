<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateDnasTable extends Migration {

	public function up()
	{
		Schema::create('dnas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('dna_serial_no', 255);
			$table->tinyInteger('id_dna_father')->unsigned();
			$table->timestamps();
			$table->tinyInteger('id_dna_mother')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('dnas');
	}
}