<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenSP');
            $table->string('AnhSP');
            $table->integer('GiaSP');
            $table->text('MoTa');
            $table->integer('SoLuong');
            $table->integer('SoLuotXem')->default(0);
            $table->string('Anh1');
            $table->string('Anh2');
            $table->string('Anh3');
            $table->integer('id_loai_san_pham')->unsigned();
            $table->foreign('id_loai_san_pham')->references('id')->on('loai_san_pham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
