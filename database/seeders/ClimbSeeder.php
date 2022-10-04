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
        [
            'climb_name' => 'Popeye',
            'climb_location' => 'The Pit / Flagstaff, AZ',
            'climb_style' => 'Sport',
            'climb_grade' => '5.9',
            'climb_description' => 'Fun route with lots of good pockets; a bit pumpy toward the top!',
            'climb_status' => 'none',
            'likes' => 2,
        ],
        [
            'climb_name' => 'Sacrificial Lizard',
            'climb_location' => "Jack's Canyon / Winslow, AZ",
            'climb_style' => 'Sport',
            'climb_grade' => '5.11b/c',
            'climb_description' => "This climb provides some technical balance moves through the crux. A little tricker for shorter climbers, but there are some helpful intermediate holds that can come in handy. The start is a little spicy, but then it lets up a bit before the crux. Careful though because the pump doesn't stop until the chains and it can be a heartbreaker.",
            'climb_status' => 'none',
            'likes' => 8,
        ],
    ];
    
    public function run()
    {
        //
        foreach($this->climbs as $climb) {
            Climb::create($climb);
        }
    }
}
