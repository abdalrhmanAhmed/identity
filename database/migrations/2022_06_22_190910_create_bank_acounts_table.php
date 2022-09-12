<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAcountsTable extends Migration {

	public function up()
	{
		Schema::create('bank_acounts', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('bank_acount_number');
			$table->string('bank_name', 255);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bank_acounts');
	}
}
