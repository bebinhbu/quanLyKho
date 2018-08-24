<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            ['name'=>'oky vòi','active_flg'=>1],
            ['name'=>'oky úp','active_flg'=>1]
        );
    }
}
