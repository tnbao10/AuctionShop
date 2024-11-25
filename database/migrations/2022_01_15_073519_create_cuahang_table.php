<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCuahangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuahang', function (Blueprint $table) {
            $table->id('ch_id');
            $table->string('ch_ten');
            $table->string('ch_diachi');
            $table->string('ch_thongtin');
            $table->string('ch_banner')->nullable();
            $table->string('ch_anhdaidien')->nullable();
            $table->integer('ch_trangthai')->default(0);
            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoidung')->onDelete('cascade');
            $table->timestamp('ch_ngaytao')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuahang');
    }
}
