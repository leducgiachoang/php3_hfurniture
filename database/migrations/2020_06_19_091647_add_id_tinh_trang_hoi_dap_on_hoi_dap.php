<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTinhTrangHoiDapOnHoiDap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoi_dap', function (Blueprint $table) {
            $table->integer('id_tinh_trang_hoi_dap')->unsigned()->nullable();
            $table->foreign('id_tinh_trang_hoi_dap')->references('id')->on('tinh_trang_hoi_dap')->onDelete('cascade');
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
