<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientsDna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_dna', function(Blueprint $table) {
			$table->increments('id');
			$table->string('D3S1358');
			$table->string('VWA');
			$table->string('FGA');
			$table->string('D8S1179');
			$table->string('D21S11');
			$table->string('D18S51');
			$table->string('D5S818');
			$table->string('D13S317');
			$table->string('D7S820');
			$table->string('D16S539');
			$table->string('THO1');
			$table->string('TPOX');
			$table->string('CSF1PO');
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
        Schema::drop('clients_dna');
    }
}
