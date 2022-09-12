<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateFatherDnaTable extends Migration {

	public function up()
	{
		Schema::create('father_dna', function(Blueprint $table) {
			$table->increments('id');
			$table->smallInteger('D3S1358');
			$table->smallInteger('VWA');
			$table->smallInteger('FGA');
			$table->smallInteger('D8S1179');
			$table->smallInteger('D21S11');
			$table->smallInteger('D18S51');
			$table->smallInteger('D5S818');
			$table->smallInteger('D13S317');
			$table->smallInteger('D7S820');
			$table->smallInteger('D16S539');
			$table->smallInteger('THO1');
			$table->smallInteger('TPOX');
			$table->smallInteger('CSF1PO');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('father_dna');
	}
}