<?php

namespace App\DataTypes;


class Rectangle
{
    /**
     * @var Coordinate
     */
    private $topLeft;

    /**
     * @var Coordinate
     */
    private $bottomRight;

    public function __construct(Coordinate $topLeft, Coordinate $bottomRight)
    {
        $this->topLeft = $topLeft;
        $this->bottomRight = $bottomRight;
    }

    /**
     * @param \App\DataTypes\Coordinate $topLeft
     */
    public function setTopLeft($topLeft)
    {
        $this->topLeft = $topLeft;
    }

    /**
     * @return \App\DataTypes\Coordinate
     */
    public function getTopLeft()
    {
        return $this->topLeft;
    }

    /**
     * @param \App\DataTypes\Coordinate $bottomRight
     */
    public function setBottomRight($bottomRight)
    {
        $this->bottomRight = $bottomRight;
    }

    /**
     * @return \App\DataTypes\Coordinate
     */
    public function getBottomRight()
    {
        return $this->bottomRight;
    }

    public function __toString()
    {
        return implode(
            ',',
            [$this->topLeft->getX(), $this->topLeft->getY(), $this->bottomRight->getX(), $this->bottomRight->getY()]
        );
    }
} 