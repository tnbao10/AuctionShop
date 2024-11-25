<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaugiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugia', function (Blueprint $table) {
            $table->id('dg_id');
            $table->dateTime('dg_thoigianbatdau');
            $table->dateTime('dg_thoigianketthuc');
            $table->integer('dg_giakhoidiem');
            $table->integer('dg_buocnhay');
            $table->integer('dg_giamax');
            $table->integer('dg_trangthai');
            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('cascade');
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
        Schema::dropIfExists('daugia');
    }
}
