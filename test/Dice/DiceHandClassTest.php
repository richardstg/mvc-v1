<?php

namespace Rist\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceHand.
 */
class DiceHandClassTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $diceHand = new DiceHand();

        $this->assertInstanceOf("\Rist\Dice\DiceHand", $diceHand);

        $res = sizeof($diceHand->getDices());
        $exp = 5;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $diceHand = new DiceHand(3);
        $this->assertInstanceOf("\Rist\Dice\DiceHand", $diceHand);

        $res = sizeof($diceHand->getDices());
        $exp = 3;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testRoll()
    {
        $diceHand = new DiceHand();
        $diceHand->roll();

        foreach ($diceHand->values() as $value) {
            $this->assertTrue($value <= 6 && $value >= 1);
        }
    }

    /**
     * Test getDice
     */
    public function testGetDice()
    {
        $diceHand = new DiceHand();
        $dice = new Dice();
        $diceHandDice = $diceHand->getDice(0);

        $this->assertTrue(gettype($diceHandDice) === gettype($dice));
    }

    /**
     * Test getDice
     */
    public function testGraphicalValues()
    {
        $diceHand = new DiceHand();
        $diceHand->roll();
        $graphValues = $diceHand->graphicalValues();

        foreach ($graphValues as $value) {
            $this->assertTrue(explode("-", $value)[0] === "dice");
            $this->assertTrue(intval(explode("-", $value)[1]) <= 6);
            $this->assertTrue(intval(explode("-", $value)[1]) >= 1);
        }
    }

    /**
     * Test sum
     */
    public function testSum()
    {
        $diceHand = new DiceHand();
        $values = $diceHand->roll();

        $this->assertTrue($diceHand->sum() === array_sum($values));
    }

    /**
     * Test sum
     */
    public function testAverage()
    {
        $diceHand = new DiceHand();
        $values = $diceHand->roll();

        $this->assertTrue($diceHand->average() === array_sum($values)/count($values));
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testSetDicesToKeepIndexes()
    {
        $diceHand = new DiceHand();
        $dicesToKeepIndexes = [0, 5, 3];
        $diceHand->setDicesToKeepIndexes($dicesToKeepIndexes);

        $i = 0;

        foreach ($dicesToKeepIndexes as $value) {
            $this->assertTrue($value === $diceHand->getDicesToKeepIndexes()[$i]);
            $i = $i + 1;
        }
    }
}
