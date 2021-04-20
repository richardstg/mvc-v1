<?php

namespace Rist\Yatzy;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class YatzyGame.
 */
class YatzyGameClassTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new YatzyGame();
        $this->assertInstanceOf("\Rist\Yatzy\YatzyGame", $game);

        $res = $game->numDices;
        $exp = 5;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $game = new YatzyGame(3);
        $this->assertInstanceOf("\Rist\Yatzy\YatzyGame", $game);

        $res = $game->numDices;
        $exp = 3;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test rollDices
     */
    public function testRollDices()
    {
        $game = new YatzyGame();
        $res = $game->rollDices();

        $this->assertEquals($game->numberOfRolls, 1);
    }

    /**
     * Test clayerPlay()
     */
    public function testSetDicesToKeepIndexes()
    {
        $game = new YatzyGame();
        $game->rollDices();

        $arr = [0, 1];
        $game->setDicesToKeepIndexes($arr);

        $i = 0;
        foreach ($game->diceHand->dicesToKeepIndexes as $value) {
            $this->assertTrue($value === $arr[$i]);
            $i = $i + 1;
        }
    }

    /**
     * Test getDicesToKeepIndexes()
     */
    public function testGetDicesToKeepIndexes()
    {
        $game = new YatzyGame();
        $game->rollDices();
        $arr = [0, 1];
        $game->setDicesToKeepIndexes($arr);
        $toKeep = $game->getDicesToKeepIndexes();

        $i = 0;
        foreach ($toKeep as $value) {
            $this->assertTrue($value === $arr[$i]);
            $i = $i + 1;
        }
    }

    /**
     * Test get dice values
     */
    public function testGetDiceHandValues()
    {
        $game = new YatzyGame();
        $values = $game->rollDices();
        $game->getDiceHandValues();

        $this->assertEquals($game->getDiceHandValues(), $values);
    }

    /**
     * Test get dice values
     */
    public function testGetDiceHandGraphicalValues()
    {
        $game = new YatzyGame();
        $values = $game->rollDices();
        $graphicValues = $game->getDiceHandGraphicalValues();

        $i = 0;
        foreach ($values as $value) {
            $this->assertTrue(("dice-" . $value) === $graphicValues[$i]);
            $i = $i + 1;
        }
    }

    /**
     * Test get dice values
     */
    public function testCountPoints()
    {
        $game = new YatzyGame();
        $values = $game->rollDices();

        $diceValue = 1;
        $this->assertTrue($game->countPoints($diceValue) <= 5);

        $diceValue = 2;
        $this->assertTrue($game->countPoints($diceValue) <= 10);

        $diceValue = 3;
        $this->assertTrue($game->countPoints($diceValue) <= 15);

        $diceValue = 4;
        $this->assertTrue($game->countPoints($diceValue) <= 20);

        $diceValue = 5;
        $this->assertTrue($game->countPoints($diceValue) <= 25);

        $diceValue = 6;
        $this->assertTrue($game->countPoints($diceValue) <= 30);
    }

    /**
     * Test newRound()
     */
    public function testNewRound()
    {
        $game = new YatzyGame();
        $game->rollDices();

        $game->newRound();

        $this->assertEquals($game->points, 0);
        $this->assertEquals($game->numberOfRolls, 0);
    }
}
