<?php
namespace Rist\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
class DiceHand
{
    /**
     * @var Dice    $dices    Array consisting of dices.
     * @var int     $values   Array consisting of last roll of the dices.
     * @var int     $numDices Number of dices.
     */
    private $dices;
    private $values;
    private $graphicalValues;
    private $numDices;

    /**
     * Constructor to create a DiceHand.
     *
     * @param int $numDices Number of dices to create, defaults to 1.
     */
    public function __construct(int $numDices = 1)
    {
        $this->dices  = [];
        $this->values = [];
        $this->graphicalValues = [];
        $this->numDices = $numDices;

        for ($i=0; $i < $numDices; $i++) {
            array_push($this->dices, new GraphicalDice());
            array_push($this->values, null);
            array_push($this->graphicalValues, null);
        }
    }

    /**
     * Roll the dices.
     *
     * @return void.
     */
    public function roll()
    {
        for ($i=0; $i < $this->numDices; $i++) {
            $this->values[$i] = $this->dices[$i]->roll();
            $this->graphicalValues[$i] = $this->dices[$i]->graphic();
        }
    }

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values()
    {
        return $this->values;
    }

    /**
     * Get grafical values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function graphicalValues()
    {
        return $this->graphicalValues;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum()
    {
        return array_sum($this->values);
    }

    /**
     * Get the average of all dices.
     *
     * @return float as the average of all dices.
     */
    public function average()
    {
        return $this->sum() / $this->numDices;
    }
}
