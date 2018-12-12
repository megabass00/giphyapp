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
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'email@prueba.com',
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
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'luisma.jig@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$S527iBgAF2k.GL7RmmoBjO5qk7.vE2gIm2230iKrUwmvQ./cuTvLi',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:50:40',
                'updated_at' => '2018-12-11 20:59:07',
                'deleted_at' => '2018-12-11 20:59:07',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'asdasd@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/C2WVQzccmFNjmzw4FGmF.Kz.nCeX5Kjz6axpEfmWoerkkKecBawq',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:55:35',
                'updated_at' => '2018-12-11 20:59:25',
                'deleted_at' => '2018-12-11 20:59:25',
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'sdfsf@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$jWdIepvhQZzfagUwzRVaz.mm0x9JccHFwdaM638djGCS1yZ..Qx6G',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 20:56:25',
                'updated_at' => '2018-12-11 20:59:17',
                'deleted_at' => '2018-12-11 20:59:17',
            ),
            7 => 
            array (
                'id' => 8,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'asdads@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$nGrIypIU65VXhc/o2CQOkO.Gvxxt/v2mwl4yokbtaGCcu6F1CGx4O',
                'active' => 0,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 21:00:06',
                'updated_at' => '2018-12-11 21:00:06',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'dfg@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$NNaSzNqcjI8MGF/nmCyZtOnEbXJjJernGiwv7yRceDbC2ybJ03OWS',
                'active' => 0,
                'activation_token' => 'fjfr3MmPpNYqj8WEOlcHKPtjGFRUcSWebHMf6PLQKSX3Jskq9XyFjwH25UhI',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 21:03:19',
                'updated_at' => '2018-12-11 21:03:19',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'dfgsdggsdsdfsdfsdf@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cJGJSs4qcKDq8pY6UZR4KOFbtp8sODKTAynEr/E93vgtZQcpWVfI2',
                'active' => 1,
                'activation_token' => '',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 21:03:51',
                'updated_at' => '2018-12-11 21:04:14',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => 'adfssadf@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zdTmy1768GhCcIj9xqyP4eZYsji84Aqm/5uSEPTSvOmi.gsEprDQG',
                'active' => 0,
                'activation_token' => 'aqznIQG7RgyHiNyGQCeaJGAMz0g98bUtPUxmkpWGYAyT3quyVjBoq5RfP1h4',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 21:20:18',
                'updated_at' => '2018-12-11 21:20:18',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'type' => 'member',
                'name' => 'Nombre',
                'last_name' => 'Apellidos',
                'email' => '213312@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zHvaNlPXEAAt.O5fH29yKuSSdqggdhwJpZ.liKhjOYZP8sxBPGFV2',
                'active' => 0,
                'activation_token' => 'X3qOcXmhD3AmG6KUiBtbvx0TQQMC4S5a9nN7zhGMWIi4CsxOl3w2sPG6aoMk',
                'remember_token' => NULL,
                'created_at' => '2018-12-11 21:21:26',
                'updated_at' => '2018-12-11 21:21:26',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}