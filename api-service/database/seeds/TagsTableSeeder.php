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
                'name' => 'payaso',
                'created_at' => '2019-01-04 09:52:28',
                'updated_at' => '2019-01-04 09:52:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'sarita',
                'created_at' => '2019-01-04 09:53:22',
                'updated_at' => '2019-01-04 09:53:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'marron',
                'created_at' => '2019-01-04 09:54:11',
                'updated_at' => '2019-01-04 09:54:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'aplauso',
                'created_at' => '2019-01-04 09:57:39',
                'updated_at' => '2019-01-04 09:57:39',
            ),
        ));
        
        
    }
}