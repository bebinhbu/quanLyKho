<?php

use Illuminate\Database\Seeder;
class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            ['name'=>'Đồ ăn','description'=>'Đồ ăn để người ăn','active_flg'=>'1'],
            ['name'=>'Thức uống','description'=>'Nước để người uống','active_flg'=>'1']
        ]);
    }
}
