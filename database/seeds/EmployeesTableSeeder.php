<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(
            ['name'=>'binhbu','active_flg'=>1],
            ['name'=>'truongle','active_flg'=>1],
            ['name'=>'giangcoi','active_flg'=>1]
        );
    }
}
