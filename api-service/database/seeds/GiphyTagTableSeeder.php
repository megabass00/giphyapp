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
                'id' => 1,
                'giphy_id' => 18,
                'tag_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}