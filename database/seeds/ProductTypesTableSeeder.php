<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('product_types')->insert([
           'name'=>''
        ]);
    }
}
