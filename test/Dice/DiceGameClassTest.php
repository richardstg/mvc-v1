<?php

namespace Rist\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceHand.
 */
class DiceGameClassTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Rist\Dice\DiceGame", $diceGame);

        $res = $diceGame->numDices;
        $exp = 1;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $diceGame = new DiceGame(3);
        $this->assertInstanceOf("\Rist\Dice\DiceGame", $diceGame);

        $res = $diceGame->numDices;
        $exp = 3;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test playerPlay()
     */
    public function testPlayerPlay()
    {
        $diceGame = new DiceGame();
        $res = $diceGame->playerPlay();

        $diceGame->diceHand;

        $this->assertEquals($diceGame->playerLastHand, $diceGame->diceHand->values());
        $this->assertEquals($diceGame->playerLastHandSum, $diceGame->diceHand->sum());
        $this->assertEquals($diceGame->playerLastHandGraphical, $diceGame->diceHand->graphicalValues());
        $this->assertEquals($diceGame->protocol["player"], $diceGame->diceHand->sum());

        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        // $diceGame->playerPlay();
        //
        // $this->assertEquals($diceGame->playerWin === false);
        // $this->assertEquals($diceGame->computerWin === true);
    }

    /**
     * Test clayerPlay()
     */
    public function testComputerPlay()
    {
        $diceGame = new DiceGame();
        $res = $diceGame->computerPlay();

        $diceGame->diceHand;

        $this->assertEquals($diceGame->computerLastHand, $diceGame->diceHand->values());
        $this->assertEquals($diceGame->computerLastHandSum, $diceGame->diceHand->sum());
        $this->assertEquals($diceGame->protocol["computer"], $diceGame->diceHand->sum());
    }

    /**
     * Test assertWinner
     */
    public function testAssertWinner()
    {
        $diceGame = new DiceGame();
        // $diceGame->playerPlay();
        // $diceGame->computerPlay();

        $diceGame->protocol["player"] = 21;
        $diceGame->protocol["computer"] = 0;

        $diceGame->assertWinner();

        $this->assertTrue($diceGame->playerTotalScore === 1);
        $this->assertTrue($diceGame->computerWin === false);

        $diceGame = new DiceGame();

        $diceGame->protocol["player"] = 210;

        $diceGame->assertWinner();

        $this->assertTrue($diceGame->playerWin === false);
        $this->assertTrue($diceGame->computerWin === true);
    }

    /**
     * Test newRound()
     */
    public function testNewRound()
    {
        $diceGame = new DiceGame();
        $diceGame->playerPlay();
        $diceGame->playerPlay();
        $diceGame->computerPlay();

        $diceGame->newRound();

        $this->assertEquals($diceGame->playerLastHandSum, 0);
        $this->assertEquals($diceGame->computerLastHandSum, 0);
        $this->assertEquals($diceGame->playerWin, false);
        $this->assertEquals($diceGame->computerWin, false);
    }
}
