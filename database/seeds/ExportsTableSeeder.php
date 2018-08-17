<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ExportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $customer_id = DB::table('customers')->pluck('id')->all();
        $count_customer = count($customer_id);
        $employee_id = DB::table('employees')->pluck('id')->all();
        $count_employee = count($employee_id);
        for($i=0;$i<5;$i++) {
            DB::table('exports')->insert([
                'date' => $faker->dateTimeBetween($starDate = '-5 years', $endDate = 'now', $timezone = null),
                'employee_id' => $employee_id[rand(0, $count_employee - 1)],
                'customer_id' => $customer_id[rand(0, $count_customer - 1)],
                'active_flg' => '1'
            ]);
        }
    }
}
