<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankNameTable extends Migration {

	public function up()
	{
		Schema::create('bank_name', function(Blueprint $table) {
			$table->increments('id');
			$table->string('b_name', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bank_name');
	}
}