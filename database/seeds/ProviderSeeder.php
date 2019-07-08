<?php

use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider=array([
            'name'=> 'Rizadas',
            'phone_number'=>'3196031231',
            'city'=> 'Bogotá'
        ],[
            'name'=> 'Bimbo',
            'phone_number'=>'3196031231',
            'city'=> 'Bogotá'
        ]);
        DB::table('provider')->insert($provider);
    }
}
