<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Location;
use App\Direction;

class CreateLocations extends Command
{
    const NORTH_VECTOR = "50,0,974,50";
    const SOUTH_VECTOR = "50,750,974,800";
    const WEST_VECTOR = "0,50,50,750";
    const EAST_VECTOR = "974,50,1024,750";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'locations:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new locations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Deleting old locations');
        Location::truncate();
        $this->info('Deleting old directions');
        Direction::truncate();

        $this->info('Creating new locations');
        $cave = new Location();
        $cave->id = 1;
        $cave->name = 'cave';
        $cave->image_name = 'cave.jpg';

        $shoreMountains = new Location();
        $shoreMountains->id = 2;
        $shoreMountains->name = 'shore mountains';
        $shoreMountains->image_name = 'shore_mountain.png';

        $caveEntrance = new Location();
        $caveEntrance->id = 3;
        $caveEntrance->name = 'cave entrance';
        $caveEntrance->image_name = 'cave_entrance.jpg';

        $castle = new Location();
        $castle->id = 4;
        $castle->name = 'castle';
        $castle->image_name = 'castle.jpg';

        $westBeach = new Location();
        $westBeach->id = 5;
        $westBeach->name = 'west beach';
        $westBeach->image_name = 'west_beach.png';

        $forest = new Location();
        $forest->id = 6;
        $forest->name = 'forest';
        $forest->image_name = 'forest.jpg';

        $valley = new Location();
        $valley->id = 7;
        $valley->name = 'valley';
        $valley->image_name = 'valley.png';

        $cottage = new Location();
        $cottage->id = 8;
        $cottage->name = 'cottage';
        $cottage->image_name = 'cottage.jpg';

        $shipwreckBeach = new Location();
        $shipwreckBeach->id = 9;
        $shipwreckBeach->name = 'shipwreck beach';
        $shipwreckBeach->image_name = 'shipwreck_beach.jpg';

        $fishermanVillage = new Location();
        $fishermanVillage->id = 10;
        $fishermanVillage->name = 'fisherman village';
        $fishermanVillage->image_name = 'fisherman_village.png';

        $cave->save();
        $shoreMountains->save();
        $caveEntrance->save();
        $castle->save();
        $westBeach->save();
        $forest->save();
        $valley->save();
        $cottage->save();
        $shipwreckBeach->save();
        $fishermanVillage->save();

        $this->createDirectionNorthToSouth($shoreMountains, $westBeach);
        $this->createDirectionNorthToSouth($cave, $caveEntrance);
        $this->createDirectionNorthToSouth($caveEntrance, $forest);
        $this->createDirectionNorthToSouth($forest, $shipwreckBeach);
        $this->createDirectionNorthToSouth($castle, $valley);
        $this->createDirectionNorthToSouth($valley, $fishermanVillage);

        $this->createDirectionWestToEast($shoreMountains, $caveEntrance);
        $this->createDirectionWestToEast($caveEntrance, $castle);
        $this->createDirectionWestToEast($westBeach, $forest);
        $this->createDirectionWestToEast($forest, $valley);
        $this->createDirectionWestToEast($valley, $cottage);
        $this->createDirectionWestToEast($shipwreckBeach, $fishermanVillage);
    }

    private function createDirectionNorthToSouth (Location $from, Location $to)
    {
        $direction = new Direction();
        $direction->setSource($from);
        $direction->setDestination($to);
        $direction->description = $from->name.' to '.$to->name;
        $direction->vector = self::SOUTH_VECTOR;
        $direction->save();

        $direction = new Direction();
        $direction->setSource($to);
        $direction->setDestination($from);
        $direction->description = $to->name.' to '.$from->name;
        $direction->vector = self::NORTH_VECTOR;
        $direction->save();
    }

    private function createDirectionWestToEast (Location $from, Location $to)
    {
        $direction = new Direction();
        $direction->setSource($from);
        $direction->setDestination($to);
        $direction->description = $from->name.' to '.$to->name;
        $direction->vector = self::EAST_VECTOR;
        $direction->save();

        $direction = new Direction();
        $direction->setSource($to);
        $direction->setDestination($from);
        $direction->description = $to->name.' to '.$from->name;
        $direction->vector = self::WEST_VECTOR;
        $direction->save();
    }

}
