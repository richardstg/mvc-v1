<?php
namespace Rist\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
 class DiceHand
 {
     /**
      * @var array    $dices    Array consisting of dices.
      * @var array    $values   Array consisting of last roll of the dices.
      * @var int      $numDices Number of dices.
      */
     private $dices;
     private $values;
     private $graphicalValues;
     private $numDices;
     private $dicesToKeepIndexes;

     /**
      * Constructor to create a DiceHand.
      *
      * @param int $numDices Number of dices to create, defaults to 6.
      */
     public function __construct(int $numDices = 5)
     {
         $this->dices  = [];
         $this->values = [];
         $this->graphicalValues = [];
         $this->numDices = $numDices;
         $this->dicesToKeepIndexes = [];

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
             if (!in_array($i, $this->dicesToKeepIndexes)) {
                 $this->values[$i] = $this->dices[$i]->roll();
                 $this->graphicalValues[$i] = $this->dices[$i]->graphic();
             }
         }
     }

     /**
      * Set the dices.
      *
      * @return void.
      */
     public function setDices($dices)
     {
         $this->dices = $dices;
     }

     /**
      * Get which dices to keep.
      *
      * @return array.
      */
     public function getDicesToKeepIndexes()
     {
         return $this->dicesToKeepIndexes;
     }

     /**
      * Set which dices to keep.
      *
      * @return void.
      */
     public function setDicesToKeepIndexes($dicesToKeepIndexes)
     {
         $this->dicesToKeepIndexes = array_map('intval', $dicesToKeepIndexes);
     }

     /**
      * Get the dices.
      *
      * @return array.
      */
     public function getDices()
     {
         return $this->dices;
     }

     /**
      * Get dice.
      *
      * @return object.
      */
     public function getDice($index)
     {
         return $this->dices[$index];
     }

     /**
      * Add a dice to the dice hand.
      *
      * @return void.
      */
     // public function addDice($dice)
     // {
     //     array_push($this->dices, $dice);
     // }

     /**
      * Remove a dice to the dice hand.
      *
      * @return void.
      */
     // public function removeDice($index)
     // {
     //     unset($this->dices[$index]);
     // }

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
