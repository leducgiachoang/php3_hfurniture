<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TinhTrangHoiDap_Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tinh_trang_hoi_dap')->insert([
            ['id'=>1,'TenTinhTrangHoiDap'=>'Riêng tư'],
            ['id'=>2,'TenTinhTrangHoiDap'=>'công khai'],
        ]);
    }
}
