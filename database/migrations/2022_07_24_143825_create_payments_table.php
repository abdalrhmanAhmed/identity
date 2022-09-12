<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('sno');
			$table->string('uuid');
			$table->string('fac');
			$table->string('depart');
			$table->string('class_no');
			$table->integer('card_fees');
			$table->integer('reg_fees');
			$table->integer('study_fees');
			$table->integer('degree_fees');
			$table->integer('latest');
			$table->integer('fine_fees');
			$table->integer('other_fees');
			$table->integer('statment_fees');
			$table->integer('Currency');
			$table->integer('user_id');
			$table->integer('phone');
			$table->integer('total');
			$table->string('sname', 255);
            $table->datetime('collect_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
