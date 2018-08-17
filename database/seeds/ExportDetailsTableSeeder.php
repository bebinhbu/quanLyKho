<?php

use Illuminate\Database\Seeder;

class ExportDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $export_id = DB::table('exports')->pluck('id')->all();
        $count_export = count($export_id);
        $product_id = DB::table('products')->pluck('id')->all();
        $count_product = count($product_id);
        for($i=0;$i<5;$i++) {
            DB::table('export_details')->insert([
                'import_id' => $export_id[rand(0, $count_export - 1)],
                'product_id' => $product_id[rand(0, $count_product - 1)],
                'amount' => rand(1, 1000),
                'active_flg' => '1'
            ]);
        }
    }
}
