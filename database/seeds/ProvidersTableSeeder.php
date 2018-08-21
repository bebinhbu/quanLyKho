<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i< 10 ;$i++) {
            DB::table('providers')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'phone' => $faker->e164PhoneNumber,
                'active_flg' => '1'
            ]);
        }
    }
}
