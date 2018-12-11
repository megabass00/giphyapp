<?php

use Illuminate\Database\Seeder;

class GiphiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('giphies')->delete();
        
        \DB::table('giphies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Montaña de mierda',
                'description' => 'A ver que hago con tanto marron',
                'url' => 'https://media.giphy.com/media/R9cQo06nQBpRe/giphy.gif',
                'rating' => 0,
                'copies_number' => 0,
                'created_at' => '2018-12-11 20:19:40',
                'updated_at' => '2018-12-11 20:19:40',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Pero que coño',
                'description' => 'WTF',
                'url' => 'https://media.giphy.com/media/46yfwmh4XfLKE/giphy.gif',
                'rating' => 0,
                'copies_number' => 0,
                'created_at' => '2018-12-11 20:20:10',
                'updated_at' => '2018-12-11 20:20:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}