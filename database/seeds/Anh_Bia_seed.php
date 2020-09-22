<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Anh_Bia_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anh_bia')->insert([
            ['id' => 1, 'AnhBia' => 'h1_hero.jpg']
        ]);
    }
}
