<div class="total-points">
    <h3 style="border-bottom: none">Dina poäng för rundan: <?= $totalPointsPlayer ?></h3>
    <?php if ($playerLastHandSum) : ?>
        <h3 style="border-bottom: none">Poäng för senaste kast: <?= $playerLastHandSum ?></h3>
    <?php endif; ?>
</div>
<form action="play" method="post">
    <input type="submit" name="rollDices" value="Kasta">
</form>
<?php if ($totalPointsPlayer > 0) : ?>
    <form action="computerplay" method="post">
        <input type="submit" name="stopRound" value="Stanna">
    </form>
<?php endif; ?>

<div class="game-field">
<?php if ($playerLastHandSum) : ?>
    <p class="dice-utf8">
        <?php foreach($playerLastHandGraphical as $value) : ?>
            <i style="font-style: normal" class="<?= $value ?>"></i>
        <?php endforeach; ?>
    </p>
    <p>Du kastade: <?= implode(', ', $playerLastHand) ?></p>
<?php endif; ?>
</div>
