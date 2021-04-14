<?php
// var_dump($_SESSION["yatzy"]->getActiveDicesValues());
// if (isset($inactiveDicesGraphicalValues)) {
//     var_dump($inactiveDicesGraphicalValues);
// }
// if (isset($_SESSION["inactiveDicesGraphicalValues"])) {
//     var_dump($_SESSION["inactiveDicesGraphicalValues"]);
// }

?>
<form action="play" method="post">
    <?php if ($numberOfRolls > 0) : ?>
        <h1>Välj vilka tärningar du vill behålla</h1>
        <p>
            Antal gjorda kast: <?= $numberOfRolls ?>
        </p>
        <div class="game-field">
            <?php foreach($diceHandGraphicalValues as $key=>$value) : ?>
                <div class="dice">
                    <div class="dice-utf8">
                        <i style="font-style: normal" class="<?= $value ?>"></i>
                    </div>
                    <input <?= in_array($key, $dicesToKeepIndexes) ? "checked" : "" ?> type="checkbox" id="<?= $value ?>" name="dicesToKeep[]" value="<?= $key ?>"">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($numberOfRolls < 3) : ?>
        <input type="submit" name="roll" value="Kasta tärningarna">
        <?php if ($numberOfRolls > 0) : ?>
            <input type="submit" name="stop" value="Stanna">
        <?php endif; ?>
    <?php else : ?>
        <input type="submit" name="stop" value="Till resultat">
    <?php endif; ?>
</form>
