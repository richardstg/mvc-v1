<?php
namespace Rist\Yatzy;

/**
 * Yatzy game.
 */
class YatzyGame
{
    /**
     */
    public $diceHand;
    public $numDices;
    public $numberOfRolls;
    public $protocol;
    public $points;

    /**
     * Constructor to create a game.
     *
     * @param int $numDices Number of dices to create, defaults to five.
     */
    public function __construct(int $numDices = 5)
    {
        $this->protocol = ["player" => 0,"computer" => 0];
        $this->points = 0;
        $this->diceHand  = new DiceHand($numDices);
        $this->numberOfRolls = 0;
    }


    /**
    * Roll dices.
    *
    * @return array.
    */
    public function rollDices()
    {
        $this->diceHand->roll();
        $this->numberOfRolls = $this->numberOfRolls + 1;

        return $this->diceHand->values();
    }

    /**
    * Set dices to keep.
    *
    * @return array.
    */
    public function setDicesToKeepIndexes($dicesToKeepIndexes)
    {
        $this->diceHand->setDicesToKeepIndexes($dicesToKeepIndexes);
    }

    /**
    * Get dices to keep.
    *
    * @return array.
    */
    public function getDicesToKeepIndexes()
    {
        return $this->diceHand->getDicesToKeepIndexes();
    }

    /**
    * Values of dicehand.
    *
    * @return array.
    */
    public function getDiceHandValues()
    {
        return $this->diceHand->values();
    }

    /**
    * Graphical values.
    *
    * @return array.
    */
    public function getDiceHandGraphicalValues()
    {
        return $this->diceHand->graphicalValues();
    }


    /**
    * Count points.
    *
    * @return array.
    */
    public function countPoints($diceValue)
    {
        $diceValue = intval($diceValue);
        $multiplicator = 0;

        foreach ($this->getDiceHandValues() as $value) {
            if ($value === $diceValue) {
                $multiplicator = $multiplicator + 1;
            }
        }

        // if ($multiplicator * $diceValue > )

        $this->points = $multiplicator * $diceValue;

        return $this->points;
    }

    /**
     * Reset game for new round.
     *
     * @return void.
     */
    public function newRound()
    {
        $this->protocol = ["player" => 0,"computer" => 0];
        $this->points = 0;
        $this->diceHand  = new DiceHand($this->numDices);
        $this->numberOfRolls = 0;
    }
}
