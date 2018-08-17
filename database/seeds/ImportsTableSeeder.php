<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ImportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $provider_id = DB::table('providers')->pluck('id')->all();
        $count_provider = count($provider_id);
        $employee_id = DB::table('employees')->pluck('id')->all();
        $count_employee = count($employee_id);
        for($i=0;$i<5;$i++) {
            DB::table('imports')->insert([
                'date' => $faker->dateTimeBetween($starDate='-5 years',$endDate='now',$timezone=null),
                'provider_id' => $provider_id[rand(0, $count_provider - 1)],
                'employee_id' => $employee_id[rand(0, $count_employee - 1)],
                'active_flg' => '1'
            ]);
        }
    }
}
