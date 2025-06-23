<?php

$hastags = get_field('pasek_nad_logotypami', 'options');
$logos = get_field('logotypy', 'options');
$logos_home = get_field('logotypy_home', 'options');
$desc = get_field('opis_pod_logotypami', 'options');

?>

<div class="info-partners">
    <?php if ($hastags) : ?>
        <div class="info-partners__hastags">
            <div class="container">
                <?php echo $hastags; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (is_front_page()) : ?>
        <?php if ($logos_home) : ?>
            <div class="info-partners__logos">
                <?php foreach ($logos_home as $logo) : ?>
                    <div class="item">
                        <?php if ($logo['link']): ?>
                            <a href="<?php echo $logo['link']; ?>" target="_blank">
                            <?php endif; ?>
                            <?php if ($logo['logo']): ?>
                                <?php echo $logo['logo']; ?>
                            <?php endif; ?>
                            <?php if ($logo['link']) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <?php if ($logos) : ?>
            <div class="info-partners__logos">
                <?php foreach ($logos as $logo) : ?>
                    <div class="item">
                        <?php if ($logo['link']): ?>
                            <a href="<?php echo $logo['link']; ?>" target="_blank">
                            <?php endif; ?>
                            <?php if ($logo['logo']): ?>
                                <?php echo $logo['logo']; ?>
                            <?php endif; ?>
                            <?php if ($logo['link']) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($desc) : ?>
        <div class="info-partners__desc"><?php echo $desc; ?></div>
    <?php endif; ?>

</div>