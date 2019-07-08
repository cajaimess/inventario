<?php

use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventory=array([
            'product_id' =>1,
            'quantity'=>1,
            'lot_number'=>rand(50000,100000),
            'expiration_date'=>date('Y-m-d'),
            'price'=> 50000

        ],[
            'product_id' =>2,
            'quantity'=>2,
            'lot_number'=>rand(50000,100000),
            'expiration_date'=>date('Y-m-d'),
            'price'=> 40000
        ]);
        DB::table('inventory')->insert($inventory);
    }
}
