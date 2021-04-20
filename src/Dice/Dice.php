<?php
namespace Rist\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
class Dice
{
    /**
     * @var int $lastRoll    The last roll.
     * @var int $sides       The number of sides.
     */
    protected $sides;
    private $lastRoll;

    /**
     * Constructor to create a Dice.
     *
     * @param int $sides
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
        $this->lastRoll = null;
    }

    /**
     * Roll the dice.
     *
     * @return number dice number.
     */
    public function roll()
    {
        $diceNumber = random_int(1, 6);

        $this->lastRoll = $diceNumber;

        return $diceNumber;
    }

    /**
     * Get last roll.
     *
     * @return number last roll.
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }

    /**
     * Get sides.
     *
     * @return number last roll.
     */
    public function getSides()
    {
        return $this->sides;
    }
}
