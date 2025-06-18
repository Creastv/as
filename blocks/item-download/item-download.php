<?php
$items = get_field('dowloads');

$class_name = '';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<?php if ($items) { ?>
<section class="downloads <?php echo esc_attr($class_name); ?>">
    <?php foreach ($items as $item) { ?>
    <div class="col">
        <article class="downloads__item">
            <div class="downloads__item__title">
                <p> <?php echo $item['name']; ?></p>
            </div>
            <div class="downloads__item__btn">
                <a href="<?php echo $item['link']; ?>" class="btn-rev" target="_blank">
                    <?php if ($item['tekst_buttona']) { ?>
                    <?php echo $item['tekst_buttona']; ?>
                    <?php } else { ?>
                    Pobierz
                    <?php } ?>
                </a>
            </div>
        </article>
    </div>
    <?php } ?>
</section>
<?php } ?>