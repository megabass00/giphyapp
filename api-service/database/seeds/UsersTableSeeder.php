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
                'password' => '$2y$10$Y.1HrphROwAeBb6CC/qEiOIpyfdB4Qpn3qxm2NWYWanlKDgTXl36S',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => 'a4N767vCWfUHnX7gkGgJLiVhccGw5mO2WzA9lBOdWnTxCyNuSbxD4QHJJ365',
                'created_at' => '2018-12-12 19:18:07',
                'updated_at' => '2018-12-20 22:07:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}