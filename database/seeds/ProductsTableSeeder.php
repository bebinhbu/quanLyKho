<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $type_id = DB::table('product_types')->pluck('id')->all();
        $count_Type = count($type_id);
        for($i=0;$i<10;$i++) {
            DB::table('products')->insert([
                'name'=>$faker->state,
                'total'=>rand(1,100),
                'price'=>rand(1000,9999999),
                'type_id'=>$type_id[rand(0,$count_Type-1)],
                'active_flg'=>'1'
            ]);
        }
    }
}
