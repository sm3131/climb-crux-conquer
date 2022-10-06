<?php

namespace App\Services;

interface ClimbServiceContract
{
    public function storeClimbImage($image);

    public function validateClimbFromUserInput($request);

    public function writeClimbToDatabase($validClimb);
}
