<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('full_name_en', 255)->nullable();
			$table->string('full_name_ar', 255)->nullable();
			$table->integer('father_national_no')->nullable();
			$table->date('b_date')->nullable();
			$table->boolean('gender')->default(0)->nullable();
			$table->bigInteger('b_certify_no')->nullable();
			$table->string('public_addres', 255)->nullable();
			$table->integer('id_workplace')->unsigned()->nullable();
			$table->integer('id_social_situation')->nullable();
			$table->integer('id_blood_type')->nullable();
			$table->integer('id_birth_place')->nullable();
			$table->integer('id_profession')->nullable();
			$table->integer('id_country_births')->nullable();
			$table->integer('id_education')->nullable();
			$table->integer('id_pro_classification')->nullable();
			$table->integer('id_religion')->nullable();
			$table->integer('phone_no')->nullable();
			$table->tinyInteger('id_dna')->unsigned()->nullable();
			$table->tinyInteger('id_bank_acount')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}