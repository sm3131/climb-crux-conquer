<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $users = [
        [
            'name' => 'Cameron',
            'email' => 'cam@email.com',
            'password' => '$2a$04$.e6Wvojb0uQHf3H4TNS6jecu9l9fdKxhcWVhLsg0czrza/Ue2/tsS',
        ],
        [
            'name' => 'Pitony',
            'email' => 'piton@email.com',
            'password' => '$2a$04$.e6Wvojb0uQHf3H4TNS6jecu9l9fdKxhcWVhLsg0czrza/Ue2/tsS',
        ],
        [
            'name' => 'Sendy',
            'email' => 'send@email.com',
            'password' => '$2a$04$.e6Wvojb0uQHf3H4TNS6jecu9l9fdKxhcWVhLsg0czrza/Ue2/tsS',
        ],
        [
            'name' => 'Jamison',
            'email' => 'jam@email.com',
            'password' => '$2a$04$.e6Wvojb0uQHf3H4TNS6jecu9l9fdKxhcWVhLsg0czrza/Ue2/tsS',
        ],
        [
            'name' => 'Crimpton',
            'email' => 'crimp@email.com',
            'password' => '$2a$04$.e6Wvojb0uQHf3H4TNS6jecu9l9fdKxhcWVhLsg0czrza/Ue2/tsS',
        ],
    ];
    
     
    public function run()
    {
        //
        foreach($this->users as $user) {
            User::create($user);
        }
    }
}
