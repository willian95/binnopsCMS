<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(Video::count() == 0){

            $video = new Video;
            $video->link = "https://www.youtube.com/embed/iVS-AuSjpOQ";
            $video->save();

        }

    }
}
