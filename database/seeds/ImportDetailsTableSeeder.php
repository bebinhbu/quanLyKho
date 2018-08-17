<?php

use Illuminate\Database\Seeder;

class ImportDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $import_id = DB::table('imports')->pluck('id')->all();
        $count_import = count($import_id);
        $product_id = DB::table('products')->pluck('id')->all();
        $count_product = count($product_id);
        for($i=0;$i<1;$i++) {
            DB::table('import_details')->insert([
                'import_id' => $import_id[rand(0, $count_import - 1)],
                'product_id' => $product_id[rand(0, $count_product - 1)],
                'amount' => rand(1, 1000),
                'active_flg' => '1'
            ]);
        }
    }
}
