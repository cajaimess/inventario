<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product= array([
            'provider_id'=>1,
            'name'=> 'Papas Sabor Tomate',
            'description'=>'Producto ondulado con sabor a tomate',
            'price'=>1000
            
        ],
        [
            'provider_id'=>2,
            'name'=> 'Ponque bimbo',
            'description'=>'Ponque con 6 porciones y sabor a chocolate',
            'price'=>2500
        ]);
        DB::table('product')->insert($product);
    }
}
