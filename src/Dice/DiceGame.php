<?php
namespace Rist\Dice;

/**
 * Dice game.
 */
class DiceGame
{
    /**
     * @var DiceHand    $diceHand       DiceHand object.
     * @var int         $numDices       Number of dices.
     * @var int         $numPlayers     Number of players.
     * @var int         $pointsRound    Points of round.
     * @var array       $protocol       Game stats, points of each player.
     */
    public $diceHand;
    public $numDices;
    public $protocol;
    public $computerLastHand;
    public $playerLastHand;
    public $playerLastHandGraphical;
    public $playerLastHandSum;
    public $computerLastHandSum;
    public $playerWin;
    public $computerWin;
    public $playerTotalScore;
    public $computerTotalScore;


    /**
     * @var integer MAXPOINTS Maximum points.
     */
    const MAXPOINTS = 21;

    /**
     * Constructor to create a DiceGame.
     *
     * @param int $numDices Number of dices to create, defaults to five.
     */
    public function __construct(int $numDices = 1)
    {
        $this->diceHand  = new DiceHand($numDices);
        $this->numDices = $numDices;
        $this->protocol = ["player" => 0,"computer" => 0];
        $this->playerLastHand = [];
        $this->computerLastHand = [];
        $this->playerLastHandGraphical = [];
        $this->playerLastHandSum = 0;
        $this->computerLastHandSum = 0;
        $this->playerWin = false;
        $this->computerWin = false;
        $this->playerTotalScore = 0;
        $this->computerTotalScore = 0;
    }

     /**
     * Player play.
     *
     * @return array.
     */
    public function playerPlay()
    {
        $this->diceHand->roll();
        $this->playerLastHand = $this->diceHand->values();
        $this->playerLastHandSum = $this->diceHand->sum();
        $this->playerLastHandGraphical = $this->diceHand->graphicalValues();
        $this->protocol["player"] += $this->diceHand->sum();

        // if ($this->protocol["player"] === 21) {
        //     $this->playerWin = true;
        //     $this->playerTotalScore += 1;
        // } else if ($this->protocol["player"] > 21) {
        //     $this->computerWin = true;
        //     $this->computerTotalScore += 1;
        // }

        $this->assertWinner();

        return $this->diceHand->values();
    }

    /**
    * Assert winner.
    *
    * @return void.
    */
   public function assertWinner()
   {
       if ($this->protocol["player"] === 21) {
           $this->playerWin = true;
           $this->playerTotalScore += 1;
       } else if ($this->protocol["player"] > 21) {
           $this->computerWin = true;
           $this->computerTotalScore += 1;
       }
   }

    /**
     * Computer play.
     *
     * @return array.
     */
    public function computerPlay()
    {
        while ($this->protocol["computer"] <= $this->protocol["player"]) {
            $this->diceHand->roll();
            $this->computerLastHand = $this->diceHand->values();
            $this->computerLastHandSum = $this->diceHand->sum();
            $this->protocol["computer"] += $this->diceHand->sum();
        }

        // if ($this->protocol["computer"] > 21) {
        //     $this->playerWin = true;
        //     $this->playerTotalScore += 1;
        // } else {
        //     $this->computerWin = true;
        //     $this->computerTotalScore += 1;
        // }

        $this->assertWinner();

        return $this->diceHand->values();

    }

    /**
     * Reset game for new round.
     *
     * @return void.
     */
    public function newRound()
    {
        $this->protocol = ["player" => 0,"computer" => 0];
        $this->playerLastHand = [];
        $this->computerLastHand = [];
        $this->playerLastHandGraphical = [];
        $this->playerLastHandSum = 0;
        $this->computerLastHandSum = 0;
        $this->playerWin = false;
        $this->computerWin = false;
    }
}
