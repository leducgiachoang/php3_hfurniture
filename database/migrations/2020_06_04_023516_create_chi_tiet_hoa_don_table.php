<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hoa_don')->unsigned();
            $table->foreign('id_hoa_don')->references('id')->on('hoa_don')->onDelete('cascade');
            $table->integer('id_san_pham')->unsigned();
            $table->foreign('id_san_pham')->references('id')->on('san_pham')->onDelete('cascade');
            $table->integer('SoLuongMua');
            $table->integer('DonGia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
}
