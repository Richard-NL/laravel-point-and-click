<?php

namespace App\Model;

use App\DataTypes\Vector;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = 'directions';
    public $timestamps = false;

    public function locationSource()
    {
        return $this->belongsTo('App\Location', 'location_source_id');
    }

    public function locationDestination()
    {
        return $this->belongsTo('App\Location', 'location_destination_id');
    }

    public function setSource(Location $location)
    {
        $this->location_source_id = $location->id;
    }

    public function setDestination(Location $destination)
    {
        $this->location_destination_id = $destination->id;
    }

    public function getVector()
    {
        return new Vector($this->vector);
    }
}
