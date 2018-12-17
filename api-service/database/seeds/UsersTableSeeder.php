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
                'name' => 'Luis',
                'last_name' => 'Izquierdo Quintana',
                'email' => 'megabass00@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/vPk37zlpVK6b2JgIaQlC.9qHWkIhtvqHexY2GnaGEZGa12xu0sna',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:04:36',
                'updated_at' => '2018-12-11 20:04:36',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'member',
                'name' => 'Perico',
                'last_name' => 'de los Palotes',
                'email' => 'perico@palotes.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QRG3V/Tn8nKgdMnbMfoYVOCwaJjDMVwyPl06WxLeBuqvh4JPOxy62',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:05:02',
                'updated_at' => '2018-12-11 20:05:02',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'member',
                'name' => 'Pepito',
                'last_name' => 'Grillo',
                'email' => 'pepito@grillo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$GEBH/LCP2TWTzf6WBYnDPOzBHxebG3QmhgIc/feOjFR48MltoeFmm',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:05:28',
                'updated_at' => '2018-12-11 20:05:28',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'admin',
                'name' => 'Usuario',
                'last_name' => 'Administrador',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BlnY1N1q.TcuxncpstCMlOjrFfLQa0xEig/pi8vMJCVkExhW1ceE6',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:49:53',
                'updated_at' => '2018-12-11 20:50:09',
                'deleted_at' => '2018-12-11 20:50:09',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'member',
                'name' => 'Usuario',
                'last_name' => 'Normal',
                'email' => 'user@user.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$S527iBgAF2k.GL7RmmoBjO5qk7.vE2gIm2230iKrUwmvQ./cuTvLi',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:50:40',
                'updated_at' => '2018-12-11 20:59:07',
                'deleted_at' => '2018-12-11 20:59:07',
            ),
        ));
        
        
    }
}