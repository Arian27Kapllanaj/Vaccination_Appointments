<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationCenterHasVaccinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_center_has_vaccination', function (Blueprint $table) {
            $table->unsignedBigInteger('vaccination_center_id');
            $table->unsignedBigInteger('vaccination_id');

            $table->foreign('vaccination_center_id')->references('id')->on('vaccination_center');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccination_center_has_vaccination');
    }
}
