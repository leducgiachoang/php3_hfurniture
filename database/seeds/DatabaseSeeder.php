<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TrangThaiNguoiDungSeeder::class);
        $this->call(vai_tro_nguoi_dung::class);
        $this->call(Anh_Bia_seed::class);
        $this->call(AccAdmin::class);
        $this->call(TinhTrangHoiDap_Seed::class);
        $this->call(TinTrangHoaDon_seed::class);
    }
}
