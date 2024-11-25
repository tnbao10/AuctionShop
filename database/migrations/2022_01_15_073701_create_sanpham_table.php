<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id('sp_id');
            $table->string('sp_ten');
            $table->integer('sp_soluong');
            $table->text('sp_mota');
            $table->integer('sp_gia');  
            $table->integer('sp_trangthai')->default(1);
            $table->bigInteger('ch_id')->unsigned();
            $table->foreign('ch_id')->references('ch_id')->on('cuahang')->onDelete('cascade');
            $table->bigInteger('lsp_id')->unsigned();
            $table->foreign('lsp_id')->references('lsp_id')->on('loaisanpham')->onDelete('cascade');
            $table->bigInteger('th_id')->unsigned();
            $table->foreign('th_id')->references('th_id')->on('thuonghieu')->onDelete('cascade');
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
        Schema::dropIfExists('sanpham');
    }
}
