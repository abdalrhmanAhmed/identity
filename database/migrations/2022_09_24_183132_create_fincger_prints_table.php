<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFincgerPrintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fincger_prints', function (Blueprint $table) {
            $table->id();
            $table->string('pinkie_r');
			$table->string('ring_finger_r');
			$table->string('middle_finger_r');
			$table->string('forefinger_r');
			$table->string('thumb_r');
			$table->string('pinkie_l');
			$table->string('ring_finger_l');
			$table->string('middle_finger_l');
			$table->string('forefinger_l');
			$table->string('thumb_l');
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
        Schema::dropIfExists('fincger_prints');
    }
}
