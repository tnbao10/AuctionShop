<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdaugiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdaugia', function (Blueprint $table) {
            $table->id('ctdg_id');
            $table->dateTime('ctdg_thoigian')->default(Carbon\Carbon::now());
            $table->integer('ctdg_giatien');
            $table->bigInteger('dg_id')->unsigned();
            $table->foreign('dg_id')->references('dg_id')->on('daugia')->onDelete('cascade');
            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoidung')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdaugia');
    }
}
