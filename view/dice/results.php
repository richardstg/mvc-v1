<div class="total-points">
    <h3 style="border-bottom: none">Dina poäng för rundan: <?= $roundPointsPlayer ?></h3>
    <h3 style="border-bottom: none">Datorns poäng för rundan: <?= $roundPointsComputer ?></h3>
    <h3 style="border-bottom: none">Antal rundor som du vunnit: <?= $playerTotalScore ?></h3>
    <h3 style="border-bottom: none">Antal rundor som datorn vunnit: <?= $computerTotalScore ?></h3>
</div>
<br>
<div class="total-points">
<?php if ($playerWin) : ?>
    <h1 style="border-bottom: none">Grattis, du vann!</h1>
<?php else : ?>
    <h1 style="border-bottom: none">Du förlorade.</h1>
<?php endif; ?>
</div>
<form action="game" method="post">
    <input type="submit" name="newRound" value="Nästa runda">
</form>
<div class="game-field">
    <p>Poäng för ditt senaste kast: <?= $playerLastHandSum ?></p>
</div>
<a href="game">Återställ</a>
