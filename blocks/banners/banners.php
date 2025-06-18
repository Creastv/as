<?php

$banners = get_field('banners');

$id = 'banners-content-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'banners-content';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
?>
<div id="<?php echo esc_attr($id); ?>" class=" <?php echo esc_attr($className); ?>">
    <div class="banners__wrap">
        <p class="title"><?php echo get_field('tytul_banners'); ?></p>
        <?php
        if ($banners):
            foreach ($banners as $banner):
        ?>
                <div class="banners__item">
                    <div class="banners__img">
                        <?php echo wp_get_attachment_image($banner['baner'], 'full'); ?>
                    </div>
                    <div class="banners__content">
                        <?php echo wp_get_attachment_image($banner['logo'], 'medium', false, array('class' => 'logo')); ?>
                        <?php
                        $link = $banner['link'];
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="btn-rev"
                                style="background-color:<?php echo $banner['kolor_przycisku']; ?>;border-color:<?php echo $banner['kolor_przycisku']; ?> !important"
                                href="<?php echo esc_url($link_url); ?>"
                                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</div>