<?php

use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_nguoi_dung')->unsigned();
            $table->foreign('id_nguoi_dung')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->integer('id_tinh_trang')->unsigned();
            $table->foreign('id_tinh_trang')->references('id')->on('tinh_trang_don_hang')->onDelete('cascade');
            $table->dateTime('NgayLap');
            $table->integer('TongGia');
            $table->string('NoiNhan');
            $table->string('GhiChu');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_don');
    }
}
