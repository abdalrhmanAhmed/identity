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
			$table->tinyInteger('sno');
			$table->string('uuid');
			$table->integer('register');
			$table->integer('cards');
			$table->integer('study');
			$table->integer('degree');
			$table->integer('statement');
			$table->integer('arrears');
			$table->string('ather');
			$table->integer('user_id');
			$table->string('s_name', 255);
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
