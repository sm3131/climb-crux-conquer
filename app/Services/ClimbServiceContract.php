<?php

namespace App\Services;

interface ClimbServiceContract
{
    public function storeClimbImage($image);

    public function writeNewClimbToDatabase($request);
}
