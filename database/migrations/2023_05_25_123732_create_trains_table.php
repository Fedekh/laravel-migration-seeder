<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100);
            $table->string('station_start', 100);
            $table->string('station_end', 100);
            $table->tinyInteger('time_start', 10)->unsigned();
            $table->tinyInteger('time_end', 10)->unsigned();
            $table->string('train_code');
            $table->smallint('number_carriages')->unsigned();
            $table->boolean('in_time');
            $table->boolean('delayed');
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
        Schema::dropIfExists('trains');
    }
};
