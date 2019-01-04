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
                'image' => 'default.png',
                'email' => 'megabass00@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Y.1HrphROwAeBb6CC/qEiOIpyfdB4Qpn3qxm2NWYWanlKDgTXl36S',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => 'a4N767vCWfUHnX7gkGgJLiVhccGw5mO2WzA9lBOdWnTxCyNuSbxD4QHJJ365',
                'created_at' => '2018-12-12 19:18:07',
                'updated_at' => '2018-12-20 22:07:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'member',
                'name' => 'Fernando',
                'last_name' => 'Pirri',
                'image' => 'default.png',
                'email' => 'mari@unpajo.te',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TRdcuT0pQHd3JgbQuZLA3.BrnDGe3atROc15FZFqkgKKlwLyTPDGG',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-04 09:54:54',
                'updated_at' => '2019-01-04 09:54:54',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'member',
                'name' => 'Domador',
                'last_name' => 'de girasoles',
                'image' => 'default.png',
                'email' => 'domador@girasol.anuel',
                'email_verified_at' => NULL,
                'password' => '$2y$10$gabq6oZKBIaCjeVn.yB83.bU7Re4V5Ldj7vYOBKiK7nfedMek/LMC',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2019-01-04 09:55:23',
                'updated_at' => '2019-01-04 09:55:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}