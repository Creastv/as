<?php
$steps = get_field('steps');
?>


<div class="b-steps">
    <?php foreach ($steps as $step) : ?>
    <div class="b-step">
        <?php if ($step['numer_czy_zdjecie']) : ?>
        <?php if ($step['ikona']) : ?>
        <span class="b-step__number">
            <?php echo wp_get_attachment_image($step['ikona']); ?>
        </span>
        <?php endif; ?>
        <?php else: ?>
        <?php if ($step['number']) : ?>
        <span class="b-step__number">
            <?php echo $step['number']; ?>
        </span>
        <?php endif; ?>

        <?php endif; ?>
        <?php if ($step['title']) : ?>
        <div class="b-step__title">
            <h3><?php echo $step['title']; ?></h3>
        </div>
        <?php endif; ?>
        <?php if ($step['desc']) : ?>
        <div class="b-step__desc">
            <?php echo $step['desc']; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>