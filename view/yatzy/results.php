<?php
    // if (isset($_SESSION["valueToCount"])) {
    //     var_dump($_SESSION["valueToCount"]);
    // }
    // if (isset($_SESSION["points"])) {
    //     var_dump($_SESSION["points"]);
    // }
?>


<?php if ($points > 0) : ?>
    <h1>
        Du fick <?= $points ?> poäng för spelrundan.
    </h1>
    <form action="../yatzy" method="post">
        <input type="submit" name="newRound" value="Spela igen">
    </form>
<?php else: ?>
<form action="results" method="post">
    <h1>
        Välj vilket tärningsvärde du vill räkna poäng på.
    </h1>
    <div class="game-field">
        <?php foreach($diceHandGraphicalValues as $key=>$value) : ?>
            <div class="dice">
                <div class="dice-utf8">
                    <i style="font-style: normal" class="<?= $value ?>"></i>
                </div>
                <input type="radio" id="<?= $value ?>" name="valueToCount" value="<?= explode("-", $value)[1] ?>"">
            </div>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="countPoints" value="Räkna poäng">
</form>
<?php endif; ?>
