<?php

namespace App\Viewport;

class ViewportTest extends \PHPUnit_Framework_TestCase
{
    private $viewport;

    public function setUp()
    {
        $this->viewport = new Viewport(1024, 800, 50);
    }

    public function testNorthDirectionClickArea()
    {
        $northClickArea = $this->viewport->getNorthDirectionClickArea();
        $this->assertSame(50, $northClickArea->getTopLeft()->getX());
        $this->assertSame(0, $northClickArea->getTopLeft()->getY());
        $this->assertSame(974, $northClickArea->getBottomRight()->getX());
        $this->assertSame(50, $northClickArea->getBottomRight()->getY());
    }

    public function testSouthDirectionClickArea()
    {
        $southClickArea = $this->viewport->getSouthDirectionClickArea();
        $this->assertSame(50, $southClickArea->getTopLeft()->getX());
        $this->assertSame(750, $southClickArea->getTopLeft()->getY());
        $this->assertSame(974, $southClickArea->getBottomRight()->getX());
        $this->assertSame(800, $southClickArea->getBottomRight()->getY());
    }

    public function testWestDirectionClickArea()
    {
        $westClickArea = $this->viewport->getWestDirectionClickArea();
        $this->assertSame(0, $westClickArea->getTopLeft()->getX());
        $this->assertSame(50, $westClickArea->getTopLeft()->getY());
        $this->assertSame(50, $westClickArea->getBottomRight()->getX());
        $this->assertSame(750, $westClickArea->getBottomRight()->getY());
    }

    public function testEastDirectionClickArea()
    {
        $eastClickArea = $this->viewport->getEastDirectionClickArea();
        $this->assertSame(974, $eastClickArea->getTopLeft()->getX());
        $this->assertSame(50, $eastClickArea->getTopLeft()->getY());
        $this->assertSame(1024, $eastClickArea->getBottomRight()->getX());
        $this->assertSame(750, $eastClickArea->getBottomRight()->getY());
    }
} 