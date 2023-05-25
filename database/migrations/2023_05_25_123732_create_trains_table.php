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
            $table->date('time_start');
            $table->date('time_end');
            $table->string('train_code')->NOTNULLABLE();
            $table->smallInteger('number_carriages')->unsigned()->NOTNULLABLE();
            $table->boolean('in_time')->NOTNULLABLE();
            $table->boolean('delayed')->NOTNULLABLE();
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
