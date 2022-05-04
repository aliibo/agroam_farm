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
        Schema::create('previsions', function (Blueprint $table) {
            $table->id();
            $table->float('max_temp');
            $table->float('low_temp');
            $table->integer('clouds');
            $table->string('icon');
            $table->integer('wind_dir');
            $table->integer('humidity');
            $table->integer('snow');
            $table->float('wind_spd');
            $table->date('datetime');
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
        Schema::dropIfExists('previsions');
    }
};
