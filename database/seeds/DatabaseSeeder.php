<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ProductTypesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ImportsTableSeeder::class);
        $this->call(ImportDetailsTableSeeder::class);
        $this->call(ExportsTableSeeder::class);
        $this->call(ExportDetailsTableSeeder::class);
    }
}
