<?php

use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoiDapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoi_dap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_san_pham')->unsigned();
            $table->foreign('id_san_pham')->references('id')->on('san_pham')->onDelete('cascade');
            $table->integer('id_nguoi_dung')->unsigned();
            $table->foreign('id_nguoi_dung')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->string('NoiDung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoi_dap');
    }
}
