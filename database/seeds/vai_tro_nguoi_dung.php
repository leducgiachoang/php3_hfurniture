<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vai_tro_nguoi_dung extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vai_tro_nguoi_dung')->insert([
            ['id'=>1,'TenVaiTro'=>'Người quản trị'],
            ['id'=>2,'TenVaiTro'=>'Người dùng']
        ]);
    }
}
