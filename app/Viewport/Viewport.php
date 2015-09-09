<?php

namespace App\Viewport;

use App\DataTypes\Coordinate;
use App\DataTypes\Rectangle;

class Viewport
{
    private $width;

    private $height;

    private $offsetSize;


    public function __construct($width, $height, $offsetSize)
    {
        $this->width = $width;
        $this->height = $height;
        $this->offsetSize = $offsetSize;
    }

    /**
     * @return \App\DataTypes\Rectangle
     */
    public function getNorthDirectionClickArea()
    {
        return new Rectangle(
            new Coordinate($this->offsetSize, 0),
            new Coordinate($this->width - $this->offsetSize, $this->offsetSize)
        );
    }


    /**
     * @return \App\DataTypes\Rectangle
     */
    public function getSouthDirectionClickArea()
    {
        return new Rectangle(
            new Coordinate($this->offsetSize, $this->height - $this->offsetSize),
            new Coordinate($this->width - $this->offsetSize, $this->height)
        );
    }

    /**
     * @return \App\DataTypes\Rectangle
     */
    public function getEastDirectionClickArea()
    {
        return new Rectangle(
            new Coordinate($this->width - $this->offsetSize, $this->offsetSize),
            new Coordinate($this->width, $this->height - $this->offsetSize)
        );
    }

    /**
     * @return \App\DataTypes\Rectangle
     */
    public function getWestDirectionClickArea()
    {
        return new Rectangle(
            new Coordinate(0, $this->offsetSize),
            new Coordinate($this->offsetSize, $this->height - $this->offsetSize)
        );
    }
} 