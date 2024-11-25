<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id('nd_id');
            $table->string('username');
            $table->string('password');
            $table->string('nd_hoten');
            $table->string('nd_email');
            $table->string('nd_sdt');
            $table->string('nd_namsinh');
            $table->string('nd_diachi');
            $table->integer('nd_trangthai')->default(0);
            $table->timestamp('nd_ngaytao')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
