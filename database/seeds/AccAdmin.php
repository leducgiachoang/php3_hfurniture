<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nguoi_dung')->insert([
            ['id' => 1,
            'HoTen' => 'Lê Đức Giác Hoàng',
            'TenTK' => 'leducgiachoang',
            'password' => bcrypt('123456789'),
            'email' => 'leducgiachoang@gmail.com',
            'SoDienThoai' => '0369203989',
            'AnhDaiDien' => '2a90d74b5e61cbbba38ff8190b0ed370.png',
            'id_trang_thai' => '1',
            'remember_token' => '',
            'id_vai_tro' => 1]
            
        ]);
    }
}
