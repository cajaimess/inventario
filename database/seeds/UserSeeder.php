<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=array(

            [
                'name'=> 'Camilo Jaimes',
                'document'=>'1014197630',
                'email'=> 'cajm026@gmail.com',
                'password'=>bcrypt('proyectolaravel'),
                'rol'=> 'Administrador'
            ],
            [
                'name'=> 'Peito Perez',
                'document'=>'123456789',
                'email'=> 'pepito@gmail.com',
                'password'=>bcrypt('proyectolaravel'),
                'rol'=> 'Usuario'
            ]);
    
            DB::table('users')->insert($user);
           
    }
}
