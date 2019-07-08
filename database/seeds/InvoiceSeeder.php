<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoice=array([
            'user_id'=>1,
            'invoice_number'=>rand(1000,8000),
            'total_price'=>15000

        ],[
            'user_id'=>2,
            'invoice_number'=>rand(1000,8000),
            'total_price'=>18000
        ]);
        DB::table('invoice')->insert($invoice);
    }
}
