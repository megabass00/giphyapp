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
                'image' => 'default.png',
                'last_name' => 'Izquierdo',
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
        ));
        
        
    }
}