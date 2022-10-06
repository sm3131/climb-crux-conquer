<?php

namespace App\Services;

use App\Services\ClimbServiceContract;
use App\Models\Climb;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ClimbService implements ClimbServiceContract
{
    public function storeClimbImage($image)
    {
        // Test that the image was actually stored to local storage
        // $image->store('public');
        Storage::disk('public')->putFile('/', $image);

        return true;
    }

    public function writeNewClimbToDatabase($validClimb)
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

        $climb = new Climb($alreadyFormattedAttributes);

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
