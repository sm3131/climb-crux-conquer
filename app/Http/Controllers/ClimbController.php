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

        $validatedClimb = $this->climbService->validateClimbFromUserInput($request);

        //trim after validation?

        if (array_key_exists('climb_image', $validatedClimb)) {
            $this->climbService->storeClimbImage($validatedClimb['climb_image']);
        }

        $this->climbService->writeClimbToDatabase($validatedClimb);

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

        $validatedClimb = $this->climbService->validateClimbFromUserInput($request);

        $validatedClimb['climb_id'] = $climb_id;

        if (array_key_exists('climb_image', $validatedClimb)) {
            $this->climbService->storeClimbImage($validatedClimb['climb_image']);
        }

        $this->climbService->writeClimbToDatabase($validatedClimb);

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
