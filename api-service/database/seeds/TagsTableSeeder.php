<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'simpson',
                'created_at' => '2018-12-28 13:22:52',
                'updated_at' => '2018-12-28 13:22:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'aplauso',
                'created_at' => '2018-12-28 13:23:13',
                'updated_at' => '2018-12-28 13:27:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'marron',
                'created_at' => '2018-12-28 13:23:29',
                'updated_at' => '2018-12-28 13:23:29',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'sarita',
                'created_at' => '2018-12-28 15:19:26',
                'updated_at' => '2018-12-28 15:19:26',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'payaso',
                'created_at' => '2018-12-28 15:20:31',
                'updated_at' => '2018-12-28 15:20:31',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'wonka',
                'created_at' => '2019-01-06 12:48:33',
                'updated_at' => '2019-01-06 12:48:33',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'alegria',
                'created_at' => '2019-01-06 12:48:54',
                'updated_at' => '2019-01-06 12:48:54',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'churrito',
                'created_at' => '2019-01-06 12:49:40',
                'updated_at' => '2019-01-06 12:49:40',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'ostion',
                'created_at' => '2019-01-06 12:50:10',
                'updated_at' => '2019-01-06 12:50:10',
            ),
            9 => 
            array (
                'id' => 14,
                'name' => 'tetas',
                'created_at' => '2019-01-06 12:56:40',
                'updated_at' => '2019-01-06 12:56:40',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'baile',
                'created_at' => '2019-01-06 12:57:42',
                'updated_at' => '2019-01-06 12:57:42',
            ),
            11 => 
            array (
                'id' => 16,
                'name' => 'niño',
                'created_at' => '2019-01-06 12:58:35',
                'updated_at' => '2019-01-06 12:58:35',
            ),
            12 => 
            array (
                'id' => 17,
                'name' => 'sacapuntas',
                'created_at' => '2019-01-06 12:59:03',
                'updated_at' => '2019-01-06 12:59:03',
            ),
            13 => 
            array (
                'id' => 18,
                'name' => 'travesti',
                'created_at' => '2019-01-06 13:00:36',
                'updated_at' => '2019-01-06 13:00:36',
            ),
            14 => 
            array (
                'id' => 19,
                'name' => 'cabra',
                'created_at' => '2019-01-06 13:01:31',
                'updated_at' => '2019-01-06 13:01:31',
            ),
            15 => 
            array (
                'id' => 20,
                'name' => 'risa',
                'created_at' => '2019-01-06 13:02:11',
                'updated_at' => '2019-01-06 13:02:11',
            ),
            16 => 
            array (
                'id' => 21,
                'name' => 'sorpresa',
                'created_at' => '2019-01-06 13:08:53',
                'updated_at' => '2019-01-06 13:08:53',
            ),
            17 => 
            array (
                'id' => 22,
                'name' => 'ralphie',
                'created_at' => '2019-01-06 13:10:19',
                'updated_at' => '2019-01-06 13:10:19',
            ),
            18 => 
            array (
                'id' => 23,
                'name' => 'culo',
                'created_at' => '2019-01-06 13:13:22',
                'updated_at' => '2019-01-06 13:13:22',
            ),
            19 => 
            array (
                'id' => 24,
                'name' => 'chupabarbas',
                'created_at' => '2019-01-06 13:14:39',
                'updated_at' => '2019-01-06 13:14:39',
            ),
        ));
        
        
    }
}