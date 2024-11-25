<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id('dh_id');
            $table->integer('dh_tongtien');
            $table->date('dh_ngaytao')->default(Carbon\Carbon::now());
            $table->string('dh_diachi');
            $table->string('dh_sdt');
            $table->integer('dh_trangthai')->default(0)->comment('0:dang xu ly; 1: xac nhan; 2:giao hang; 3:hoan thanh;-1:huy');
            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoidung')->onDelete('cascade');
            $table->bigInteger('ch_id')->unsigned();
            $table->foreign('ch_id')->references('ch_id')->on('cuahang')->onDelete('cascade');
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
        Schema::dropIfExists('donhang');
    }
}
