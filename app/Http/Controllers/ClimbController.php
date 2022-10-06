<?php

namespace App\Http\Controllers;

use App\Models\Climb;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClimbServiceContract;
use Illuminate\Validation\Rule;

class ClimbController extends Controller
{
    public $climbService;

    public function __construct(ClimbServiceContract $climbService)
    {
        $this->climbService = $climbService;
    }

    public function index()
    {
        return view('pages.view-climbs', [
            'climbs' => Climb::all(),
        ]);
    }

    public function show($climb_id)
    {
        return view('pages.single-climb', [
            'climb' => Climb::where('id', $climb_id)->first()
        ]);
    }

    public function store(Request $request)
    {
        // Validation?

        $validatedClimb = $request->validate([
            'climb_name'        => ['required', 'string'],
            'crag_name'         => ['required', 'string'],
            'crag_location'     => ['required', 'string', 'regex: /[A-Za-z]+, [A-Za-z]{2}/'],
            'climb_style'       => ['required', Rule::in([
                'Sport', 'Trad', 'Boulder', 'Mix', 'Ice', 'Aid'
            ]), 'string'],
            'climb_grade'       => ['required', 'max:8', 'string'],
            'climb_description' => ['required', 'string'],
            'climb_image'       => ['nullable', 'image'],
        ]);

        //trim after validation

        if (array_key_exists('climb_image', $validatedClimb)) {
            $this->climbService->storeClimbImage($validatedClimb['climb_image']);
        }

        $this->climbService->writeNewClimbToDatabase($validatedClimb);

        // Do we get redirected?
        return redirect('/view-climbs');
    }


    public function edit($climb_id)
    {
        $climb = Climb::where('id', $climb_id)->first();

        return view('pages.edit-climb', [
            'climb' => $climb
        ]);
    }

    public function update(Request $request, $climb_id)
    {
        if ($request->climb_image) {
            $request->climb_image->store('public');
        }

        $climb = Climb::where('id', $climb_id)->first();
        $climb->climb_name = $request->climb_name;
        $climb->climb_location = $request->climb_location;
        $climb->climb_style = $request->climb_style;
        $climb->climb_grade = $request->climb_grade;
        $climb->climb_description = $request->climb_description;
        if ($request->climb_image) {
            $climb->climb_image = $request->climb_image->hashName();
        }

        $climb->save();

        return redirect('/view-climbs')->with('message', $request->climb_name . ' has successfully been updated!');
    }

    public function destroy($climb_id, $climb_name)
    {
        Climb::where('id', $climb_id)->firstOrFail()->delete();

        return view('pages.delete-confirm', [
            'climb_name' => $climb_name
        ]);
    }
}
