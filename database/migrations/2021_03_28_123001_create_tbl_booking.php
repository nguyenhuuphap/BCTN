<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->date('checkindate');
            $table->time('checkintime');
            $table->string('loaiphong');
            $table->string('phuongthuc');
            $table->string('thoigian');
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
        Schema::dropIfExists('tbl_booking');
    }
}
