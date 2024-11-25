<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id('bv_id');
            $table->string('bv_tieude');
            $table->string('bv_hinhanh');
            $table->text('bv_noidung');
            $table->integer('bv_trangthai')->default(0);
            $table->date('bv_ngaytao')->default(Carbon\Carbon::now());
            $table->bigInteger('qt_id')->unsigned();
            $table->foreign('qt_id')->references('qt_id')->on('quantrivien')->onDelete('cascade');
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
        Schema::dropIfExists('baiviet');
    }
}
