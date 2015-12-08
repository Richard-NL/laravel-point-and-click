<?php

namespace App\Http\Controllers;

use App\Model\Location;

class LocationController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showLocation($id)
    {
        $location = Location::findOrFail($id);
        $transformer = new \App\ViewHelpers\DirectionJsonTransformer();

        $directionInJsonFormat = $transformer->getDirectionsAsJson($location->directions);

        return view('location', ['location' => $location, 'directions' => $directionInJsonFormat]);
    }
}