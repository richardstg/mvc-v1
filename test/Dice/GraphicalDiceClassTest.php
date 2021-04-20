<?php

namespace Rist\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class GraphicalDiceClassTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new GraphicalDice();
        $this->assertInstanceOf("\Rist\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    // /**
    //  * Construct object and verify that the object has the expected
    //  * properties. Use no arguments.
    //  */
    // public function testCreateObjectWithArguments()
    // {
    //     $dice = new GraphicalDice(3);
    //     $this->assertInstanceOf("\Rist\Dice\Dice", $dice);
    //
    //     $res = $dice->getSides();
    //     $exp = 3;
    //     $this->assertEquals($exp, $res);
    // }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testGraphic()
    {
        $dice = new GraphicalDice();
        $res = $dice->roll();

        $this->assertTrue(explode("-", $dice->graphic())[1] == $dice->getLastRoll());
    }
}
