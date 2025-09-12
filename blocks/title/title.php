<?php
$title = get_field('tytul');
$titleBorder = get_field('tytul_podkreslenie');
$titleCon = get_field('kontynuuj_tytul');
$bigTitle = get_field('duzy_tytul');
$tag = get_field('tag');
$style = get_field('style');

$class_name = ' bc-title';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
?>

<div class=" <?php echo esc_attr($class_name); ?>  <?php echo $style == 2 ? 'bc-title--rev' : false; ?>"
    <?php echo esc_attr($anchor); ?>>
    <div class="bc-title__wrap <?php echo $style == 2 ? 'bc-title__wrap--rev' : false; ?>">
        <<?php echo $tag; ?> class="bc-title__title">
            <?php echo $title; ?><span class="bc-title-border"><span> <?php echo $titleBorder; ?></span></span>
            <?php echo $titleCon; ?></<?php echo $tag; ?>>
    </div>
    <span class="bc-title-big"><?php echo $bigTitle; ?></span>
</div>