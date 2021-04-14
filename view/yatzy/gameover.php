<h1>Senaste kast</h1>
<?php if ($lastRollGraphicalValues && (count($lastRollGraphicalValues) > 0)) : ?>
    <p class="dice-utf8">
        <?php foreach($lastRollGraphicalValues as $value) : ?>
            <i style="font-style: normal" class="<?= $value ?>"></i>
        <?php endforeach; ?>
    </p>
<?php endif; ?>
