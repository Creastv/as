<?php
$class_name = 'bullets-container';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>
<?php if (have_rows('bullets')): ?>
<div class="<?php echo esc_attr($class_name); ?>">
    <?php while (have_rows('bullets')): the_row(); ?>
    <div class="bullet-item">
        <?php
                $icon = get_sub_field('ikona');
                $title = get_sub_field('tutul');
                $description = get_sub_field('opis');
                ?>

        <?php if ($icon): ?>
        <div class="bullet-icon">
            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
        </div>
        <?php endif; ?>

        <?php if ($title): ?>
        <h3 class="bullet-title"> <?php echo $title; ?> </h3>
        <?php endif; ?>

        <?php if ($description): ?>
        <p class="bullet-description"> <?php echo esc_html($description); ?> </p>
        <?php endif; ?>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>