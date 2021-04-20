<?php

namespace Rist\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceClassTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Rist\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $dice = new Dice(3);
        $this->assertInstanceOf("\Rist\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 3;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testRoll()
    {
        $dice = new Dice();
        $res = $dice->roll();

        $this->assertTrue($res <= 6 && $res >= 1);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testGetLastRoll()
    {
        $dice = new Dice();
        $res = $dice->roll();
        $exp = $dice->getLastRoll();

        $this->assertEquals($exp, $res);
    }
}
