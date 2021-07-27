<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Header;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(Header::count() == 0){

            $header = new Header;
            $header->image = "https://binnops.sytes.net/assets/images/banner.jpg";
            $header->save();

        }

    }
}
