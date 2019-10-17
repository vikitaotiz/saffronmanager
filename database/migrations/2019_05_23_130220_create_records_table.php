<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bath_towel')->nullable();
            $table->string('bed_sheet')->nullable();
            $table->string('duvet_cover')->nullable();
            $table->string('pillow_case')->nullable();
            $table->string('bed_cover')->nullable();
            $table->string('prayer_mat')->nullable();

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_id');

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
        Schema::dropIfExists('records');
    }
}
