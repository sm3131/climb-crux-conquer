<?php

namespace App\Http\Controllers;

use App\Models\Climb;
use Illuminate\Http\Request;

class ClimbController extends Controller
{
    //

    public function show()
    {
            return view('pages.view-climbs', [
                'climbs' => Climb::all()
            ]);

            // return view('pages.view-climbs', [
            //     'hello' => 'Hello World!!!'
            // ]);
    }
}
