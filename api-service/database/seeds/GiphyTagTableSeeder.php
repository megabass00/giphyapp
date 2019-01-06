<?php

use Illuminate\Database\Seeder;

class GiphyTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('giphy_tag')->delete();
        
        \DB::table('giphy_tag')->insert(array (
            0 => 
            array (
                'id' => 2,
                'giphy_id' => 9,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'giphy_id' => 9,
                'tag_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'giphy_id' => 170,
                'tag_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'giphy_id' => 101,
                'tag_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'giphy_id' => 101,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'giphy_id' => 166,
                'tag_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'giphy_id' => 166,
                'tag_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'giphy_id' => 12,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'giphy_id' => 12,
                'tag_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'giphy_id' => 11,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'giphy_id' => 11,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'giphy_id' => 9,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'giphy_id' => 10,
                'tag_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'giphy_id' => 10,
                'tag_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'giphy_id' => 15,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'giphy_id' => 161,
                'tag_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'giphy_id' => 161,
                'tag_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'giphy_id' => 160,
                'tag_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'giphy_id' => 160,
                'tag_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'giphy_id' => 158,
                'tag_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'giphy_id' => 158,
                'tag_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 23,
                'giphy_id' => 159,
                'tag_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 24,
                'giphy_id' => 159,
                'tag_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 25,
                'giphy_id' => 24,
                'tag_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 26,
                'giphy_id' => 26,
                'tag_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 27,
                'giphy_id' => 25,
                'tag_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 28,
                'giphy_id' => 5,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 29,
                'giphy_id' => 6,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 30,
                'giphy_id' => 6,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 31,
                'giphy_id' => 7,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 32,
                'giphy_id' => 7,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 33,
                'giphy_id' => 8,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 34,
                'giphy_id' => 4,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 35,
                'giphy_id' => 4,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 36,
                'giphy_id' => 3,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 37,
                'giphy_id' => 2,
                'tag_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 38,
                'giphy_id' => 2,
                'tag_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 39,
                'giphy_id' => 36,
                'tag_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 40,
                'giphy_id' => 17,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 41,
                'giphy_id' => 151,
                'tag_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 42,
                'giphy_id' => 36,
                'tag_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 43,
                'giphy_id' => 151,
                'tag_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 44,
                'giphy_id' => 1,
                'tag_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 45,
                'giphy_id' => 1,
                'tag_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 46,
                'giphy_id' => 23,
                'tag_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 47,
                'giphy_id' => 18,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 48,
                'giphy_id' => 16,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 49,
                'giphy_id' => 22,
                'tag_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 50,
                'giphy_id' => 22,
                'tag_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 51,
                'giphy_id' => 19,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 52,
                'giphy_id' => 107,
                'tag_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 53,
                'giphy_id' => 169,
                'tag_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 54,
                'giphy_id' => 168,
                'tag_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 55,
                'giphy_id' => 168,
                'tag_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 56,
                'giphy_id' => 164,
                'tag_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}