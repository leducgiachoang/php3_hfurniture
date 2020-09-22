<?php

use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HoTen');
            $table->string('TenTK');
            $table->string('password');
            $table->string('email');
            $table->string('SoDienThoai');
            $table->string('AnhDaiDien');
            $table->integer('id_trang_thai')->unsigned();
            $table->foreign('id_trang_thai')->references('id')->on('trang_thai_nguoi_dung')->onDelete('cascade');
            $table->string('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_dung');
    }
}
