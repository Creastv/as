<?php
$title = get_field('tytul');
$titleBorder = get_field('tytul_podkreslenie');
$titleCon = get_field('kontynuuj_tytul');
$bigTitle = get_field('duzy_tytul');
$tag = get_field('tag');

$class_name = ' bc-title';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
?>

<div class="<?php echo esc_attr($class_name); ?>">
    <div class="bc-title__wrap">
        <<?php echo $tag; ?> class="bc-title__title">
            <?php echo $title; ?><span class="bc-title-border"><span> <?php echo $titleBorder; ?></span></span>
            <?php echo $titleCon; ?></<?php echo $tag; ?>>
    </div>
    <span class="bc-title-big"><?php echo $bigTitle; ?></span>
</div>