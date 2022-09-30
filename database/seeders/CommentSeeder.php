<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $comments = [
        [
            'body' => "Super fun classic climb",
            'is_beta' => false,
            'climb_id' => 1,
        ],
        [
            'body' => "Very pumpy and small pockets, but fun",
            'is_beta' => false,
            'climb_id' => 2,
        ],
        [
            'body' => "Make sure you bring a lot of #1 cams with you!!!",
            'is_beta' => true,
            'climb_id' => 3,
        ],
        [
            'body' => "This line looks AMAZING!",
            'is_beta' => false,
            'climb_id' => 3,
        ],
        [
            'body' => "For shorter climbers make sure as you go over the roof pull, you look for a good pocket/divot to place your heel or foot into to help push upward to the next good hold.",
            'is_beta' => true,
            'climb_id' => 1,
        ],
    ];

    public function run()
    {
        //
        foreach($this->comments as $comment) {
            Comment::create($comment);
        }
    }
}
