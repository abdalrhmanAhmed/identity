<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('track_number');
            $table->string('id_number');
            $table->integer('mather_dna')->nullable();
            $table->integer('father_dna')->nullable();
            $table->integer('finger_print')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('trafic_number')->nullable();
            $table->string('dapt_number')->nullable();
            $table->integer('disability_information')->nullable();
            $table->integer('witness_information')->nullable();
            $table->integer('personal_information')->nullable();
            $table->integer('id_information')->nullable();
            $table->integer('marry_information')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
