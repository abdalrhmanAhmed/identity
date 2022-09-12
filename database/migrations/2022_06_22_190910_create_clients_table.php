<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('full_name_en', 255);
			$table->string('full_name_ar', 255);
			$table->integer('father_national_no');
			$table->date('b_date');
			$table->boolean('gender')->default(0);
			$table->bigInteger('b_certify_no');
			$table->string('public_addres', 255);
			$table->integer('id_workplace')->unsigned();
			$table->integer('id_social_situation');
			$table->integer('id_blood_type');
			$table->integer('id_birth_place');
			$table->integer('id_profession');
			$table->integer('id_country_births');
			$table->integer('id_education');
			$table->integer('id_pro_classification');
			$table->integer('id_religion');
			$table->integer('phone_no');
			$table->tinyInteger('id_dna')->unsigned();
			$table->tinyInteger('id_bank_acount')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}