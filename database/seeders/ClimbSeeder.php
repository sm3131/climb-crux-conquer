<?php

namespace Database\Seeders;

use App\Models\Climb;
use Illuminate\Database\Seeder;

class ClimbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $climbs = [
        [
            'climb_name' => 'Mr.Slate',
            'climb_location' => 'The Pit / Flagstaff, AZ',
            'climb_style' => 'Sport',
            'climb_grade' => '5.10b',
            'climb_description' => 'Pit classic, great warm-up for the harder routes in the area, and provides a nice small roof pull with a moderately sustained finish',
            'climb_status' => 'none',
            'likes' => 3,
        ],
        [
            'climb_name' => 'Firedance',
            'climb_location' => "Jack's Canyon / Winslow, AZ",
            'climb_style' => 'Sport',
            'climb_grade' => '5.12a',
            'climb_description' => "Excellent route for climber's pushing into the 12 range. It provides a variety of style including balance, pocket-pulling, and some bigger moves. Fun project for the budding 5.12 climber!",
            'climb_status' => 'none',
            'likes' => 6,
        ],
        [
            'climb_name' => 'Yin & Yang',
            'climb_location' => 'Red Rock / Las Vegas, NV',
            'climb_style' => 'Trad',
            'climb_grade' => '5.11a',
            'climb_description' => 'Sustained horizontal crack climbing with a lot of smearing and more smaller hand sizes. Amazing route, and definitely worth checking out if you are in the area!',
            'climb_status' => 'none',
            'likes' => 4,
        ],
        // [
        //     'climb_name' => '',
        //     'climb_location' => '',
        //     'climb_style' => '',
        //     'climb_grade' => '',
        //     'climb_description' => '',
        //     'climb_status' => '',
        //     'likes' => '',
        // ],
    ];
    
    public function run()
    {
        //
        foreach($this->climbs as $climb) {
            Climb::create($climb);
        }
    }
}
