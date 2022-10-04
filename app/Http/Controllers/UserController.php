<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($user_id)
    {
            $user_data = User::with('climbs')->where('id', $user_id)->first();

            return view('pages.my-climbs', [
                'userClimbs' => $user_data
            ]);
    }
}
