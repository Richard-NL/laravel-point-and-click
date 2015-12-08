<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    public $timestamps = false;

    public function directions()
    {
        return $this->hasMany('App\Direction', 'location_source_id');
    }
}
