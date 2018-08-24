<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(
            ['name'=>'abc','address'=>'1066 lạc long quân phường 8 quận tân bình','phone'=>'09021321312','isStore'=>1,'active_flg'=>1],
            ['name'=>'bcd','address'=>'1066 lạc long quân phường 8 quận tân bình','phone'=>'09021321312','isStore'=>1,'active_flg'=>1]
        );
    }
}
