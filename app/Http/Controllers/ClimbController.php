<?php

namespace App\Http\Controllers;

use App\Models\Climb;
use App\Models\User;
use Illuminate\Http\Request;

class ClimbController extends Controller
{
    //

    public function index()
    {
        // session('user-id', 1);
        // session('user-id');

            return view('pages.view-climbs', [
                'climbs' => Climb::all(),
                'user'=> User::where('id', )->first()
            ]);

            // return view('pages.view-climbs', [
            //     'hello' => 'Hello World!!!'
            // ]);
    }

    public function show($climb_id)
    {
        return view('pages.single-climb', [
            'climb' => Climb::where('id', $climb_id)->first()
        ]);
    }

    public function store(Request $request) 
    {


        //var_dump($request);

        $climb = new Climb();
        $climb->climb_name = $request->climb_name;
        $climb->climb_location = $request->crag_name . '/ ' . $request->crag_location;
        $climb->climb_style = $request->climb_style;
        $climb->climb_grade = $request->climb_grade;
        $climb->climb_description = $request->climb_description;

        $climb->save();

        return redirect('/view-climbs');

        // echo $climb;
        // var_dump($climb);
    }
}
