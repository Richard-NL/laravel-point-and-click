<?php
namespace App\DataTypes;


class RectangleTest extends \PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $rectangle = new Rectangle(new Coordinate(1, 2), new Coordinate(3, 4));
        $this->assertSame((string)$rectangle, '1,2,3,4');
    }
} 