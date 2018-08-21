<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++) {
            DB::table('employees')->insert([
                'name' => $faker->firstName,
                'sex' => ($i % 2 == 0) ? '1' : '0',
                'email' => $faker->freeEmail,
                'active_flg' => '1',
                'phone' => $faker->e164PhoneNumber
            ]);
        }
    }
}
