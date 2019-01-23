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
                'image' => '1547221532.PNG',
                'email' => 'megabass00@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Y.1HrphROwAeBb6CC/qEiOIpyfdB4Qpn3qxm2NWYWanlKDgTXl36S',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => '8b7i0iHZ7eMoLSLNilL94kQHh4fPXFhBc8gfZtXVSeUkXzYmwIYHm2ctH400',
                'created_at' => '2018-12-12 19:18:07',
                'updated_at' => '2019-01-11 15:45:32',
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
                'type' => 'member',
                'name' => 'Yoda',
                'last_name' => 'Test',
                'image' => 'default.png',
                'email' => 'test@yoda.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2ZZG2t7N4WnRUNuKOg7.T.hGYnIC85eait7OwLjfPtChumrbQJ7x2',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-11 15:19:50',
                'updated_at' => '2019-01-11 15:19:50',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'admin',
                'name' => 'Javi',
                'last_name' => 'BabyFucker',
                'image' => 'default.png',
                'email' => 'mohamed@jig.es',
                'email_verified_at' => NULL,
                'password' => '$2y$10$hqphV5yLeaoW0ZCE2O685Oar/c5Egg33z764ijc4NK7etFSnCQZD2',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-16 09:51:21',
                'updated_at' => '2019-01-16 09:51:21',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 'admin',
                'name' => 'Yarael',
                'last_name' => 'Garcia',
                'image' => 'default.png',
                'email' => 'dgarcia@jig.es',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mfO3.aAj1O/JfFWouPRvEuCnZGBIrhgJ0pGFtrDRbieWZeWkTs39O',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-21 14:17:19',
                'updated_at' => '2019-01-21 14:17:19',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}