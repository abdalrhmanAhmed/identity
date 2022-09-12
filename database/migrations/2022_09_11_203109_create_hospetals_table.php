<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospetalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospetals', function (Blueprint $table) {
            $table->id();
            $table->integer('local_id');
            $table->string('h_no');
            $table->integer('id_no');
            $table->integer('type');
            $table->string('files_route', 255);
            $table->string('descrption', 255);
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
        Schema::dropIfExists('hospetals');
    }
}
