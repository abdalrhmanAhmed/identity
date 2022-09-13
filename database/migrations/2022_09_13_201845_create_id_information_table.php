<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_information', function (Blueprint $table) {
            $table->id();
            $table->text('trak_id');
            $table->string('britrh_state');
            $table->string('britrh_local');
            $table->string('britrh_adminstrative_unit');
            $table->string('britrh_peoples_adminstration');
            $table->string('work_state_place');
            $table->string('work_local_place');
            $table->string('work_adminstrative_unit');
            $table->string('work_peoples_adminstration');
            $table->string('work_place');
            $table->string('nationality_type');
            $table->bigInteger('nationality_number');
            $table->string('religion');
            $table->string('old_nationality_number');
            $table->string('mother_lang');
            $table->string('name_before_naturalization');
            $table->string('mother_name_brfore_naturalization');
            $table->string('father_name_before_naturalization');
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
        Schema::dropIfExists('id_information');
    }
}
