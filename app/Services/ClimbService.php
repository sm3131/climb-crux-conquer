<?php

namespace App\Services;

use App\Services\ClimbServiceContract;
use App\Models\Climb;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClimbService implements ClimbServiceContract
{
    public function storeClimbImage($image)
    {
        // Test that the image was actually stored to local storage
        // $image->store('public');
        Storage::disk('public')->putFile('/', $image);

        return true;
    }

    public function validateClimbFromUserInput($request)
    {
        //
        $validClimb = $request->validate([
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

        return $validClimb;
    }

    // public function formatValidClimbInformationForDatabaseStoring($validClimb)
    // {

    //     $formattedClimbAttributes = [
    //         'climb_name' => $validClimb['climb_name'],
    //         'climb_style' => $validClimb['climb_style'],
    //         'climb_grade' => $validClimb['climb_grade'],
    //         'climb_description' => $validClimb['climb_description'],
    //     ]

    //     $alreadyFormattedAttributes = Collection::wrap($validClimb)
    //         ->only([
    //             'climb_name',
    //             'climb_style',
    //             'climb_grade',
    //             'climb_description'
    //         ])->all();

    //     $climb->climb_location = $validClimb['crag_name']
    //         . '/'
    //         . ' '
    //         . $validClimb['crag_location'];

    //     if (array_key_exists('climb_image', $validClimb)) {
    //         $climb->climb_image = $validClimb['climb_image']->hashName();
    //     }
    // }

    public function writeClimbToDatabase($validClimb)
    {
        // Maybe trim whitespace here

        // Want to make sure we actually get an instance of Climb
        $alreadyFormattedAttributes = Collection::wrap($validClimb)
            ->only([
                'climb_name',
                'climb_style',
                'climb_grade',
                'climb_description'
            ])->all();

        if (array_key_exists('climb_id', $validClimb)) {
            $climb = Climb::where('id', $validClimb['climb_id'])->first();
        } else {
            $climb = new Climb($alreadyFormattedAttributes);
        }

        $climb->update($alreadyFormattedAttributes);

        // Is this concatenation working the way we expect it to?
        $climb->climb_location = $validClimb['crag_name']
            . '/'
            . ' '
            . $validClimb['crag_location'];

        if (array_key_exists('climb_image', $validClimb)) {
            $climb->climb_image = $validClimb['climb_image']->hashName();
        }
        // Want to make sure these are set and persist in DB
        $climb->save();
    }
}
