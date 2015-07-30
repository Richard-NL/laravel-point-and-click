<?php
namespace App\ViewHelpers;

use Illuminate\Database\Eloquent\Collection;

class DirectionJsonTransformer
{
    public function getDirectionsAsJson(Collection $directions)
    {
        $data = [];

        foreach ($directions as $direction) {
            $record = [
                'topLeft' => ['x' => (int)$direction->getVector()->topLeft->getX(), 'y' => (int)$direction->getVector()->topLeft->getY()],
                'bottomRight' => ['x' => (int)$direction->getVector()->bottomRight->getX(), 'y' => (int)$direction->getVector()->bottomRight->getY()],
                'description' => $direction->description,
                'link' => '/'.$direction->location_destination_id
            ];
            $data[] = $record;
        }
        return json_encode($data);
    }
}