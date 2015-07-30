<?php

namespace App\DataTypes;


class Vector
{
    public $topLeft;
    public $topRight;
    public $bottomLeft;
    public $bottomRight;

    public function __construct ($vector)
    {
        $pieces = explode(',', trim($vector));
        if ($pieces === false || count($pieces) !== 4 ) {
            throw new \UnexpectedValueException ('Invalid vector string given');
        }
        $left = $pieces[0];
        $top = $pieces[1];
        $right = $pieces[2];
        $bottom = $pieces[3];

        $this->topLeft = new Coordinate($left, $top);
        $this->topRight = new Coordinate($right, $top);
        $this->bottomLeft = new Coordinate($left, $bottom);
        $this->bottomRight = new Coordinate($right, $bottom);
    }
}
