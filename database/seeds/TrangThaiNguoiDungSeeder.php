<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrangThaiNguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trang_thai_nguoi_dung')->insert([
            ['id' => 1, 'TrangThaiNguoiDung' => 'Đã kích hoạt'],
            ['id' => 2, 'TrangThaiNguoiDung' => 'Chưa kích hoạt'],
        ]);
    }
}
