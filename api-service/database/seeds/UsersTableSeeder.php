<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'admin',
                'name' => 'Predator',
                'last_name' => 'Izquierdo',
                'image' => 'default.png',
                'email' => 'megabass00@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Y.1HrphROwAeBb6CC/qEiOIpyfdB4Qpn3qxm2NWYWanlKDgTXl36S',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => '8b7i0iHZ7eMoLSLNilL94kQHh4fPXFhBc8gfZtXVSeUkXzYmwIYHm2ctH400',
                'created_at' => '2018-12-12 19:18:07',
                'updated_at' => '2019-01-06 16:03:05',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'admin',
                'name' => 'Fernando',
                'last_name' => 'Pirri',
                'image' => '1546856877.PNG',
                'email' => 'mari@unpajo.te',
                'email_verified_at' => NULL,
                'password' => '$2y$10$c5OinJyRGHxpVwM8YLX4p./Uli64pbfb2BOmxIBknpCryW06ih6fG',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-07 07:52:30',
                'updated_at' => '2019-01-07 10:27:57',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'admin',
                'name' => 'Domador',
                'last_name' => 'Holestamer',
                'image' => 'default.png',
                'email' => 'domador@girasol.anuel',
                'email_verified_at' => NULL,
                'password' => '$2y$10$MOE9NX1AxMETwI/gEBJLvO9WgfS3FNenHDEDAqSi.BqMkKw7ZD6ba',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-07 07:52:58',
                'updated_at' => '2019-01-07 07:52:58',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'admin',
                'name' => 'Jordi',
                'last_name' => 'Markes',
                'image' => 'default.png',
                'email' => 'elabortounahiena@giphy.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8ecAkp71FXKivG6Q8Ze9cer6e82GihNcpGz.RoSLKJy3QGiia7zQW',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-07 09:26:35',
                'updated_at' => '2019-01-07 09:26:35',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'admin',
                'name' => 'Miguel',
                'last_name' => 'Regueton',
                'image' => 'default.png',
                'email' => 'miguelin@giphy.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zuMj7Rr4FGm1IjzgHZ8qI.niXbs1gUcBEcyF2tU4kshteYfGXbFtS',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-07 11:55:29',
                'updated_at' => '2019-01-07 11:55:29',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}