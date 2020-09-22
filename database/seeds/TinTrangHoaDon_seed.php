<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TinTrangHoaDon_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tinh_trang_don_hang')->insert([
            ['id'=>1,'TinhTrangDonHang'=>'Chờ xử lý'],
            ['id'=>2,'TinhTrangDonHang'=>'Đang giao hàng'],
            ['id'=>3,'TinhTrangDonHang'=>'Đã giao hàng'],
            ['id'=>4,'TinhTrangDonHang'=>'Đã hủy']
        ]);
    }
}
