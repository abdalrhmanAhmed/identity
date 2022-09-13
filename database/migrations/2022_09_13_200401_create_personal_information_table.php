<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->text('trak_id');
            $table->string('full_name_ar');
            $table->string('full_name_en');
            $table->string('gender');
            $table->date('brith_day');
            $table->string('contry_place_id');
            $table->bigInteger('father_national_number');
            $table->bigInteger('brith_certificat_number');
            $table->string('blood_type_id');
            $table->string('social_situation');
            $table->string('job_id');
            $table->string('occupational_classification');
            $table->string('qualification');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->string('mother_national_number');
            $table->string('mother_name');
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
        Schema::dropIfExists('personal_information');
    }
}
