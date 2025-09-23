<?php

/**
 * Banner Slider (ACF Block)
 * Zakładam, że ten plik jest dołączany jako render_template Twojego bloku ACF.
 */

// Unikalne ID/klasy dla izolacji styli i nawigacji
$slider = get_field('slider');
$block_id    = 'banner-swiper-' . ($block['id'] ?? uniqid());
$wrapper_cls = 'banner-swiper ' . (!empty($block['className']) ? esc_attr($block['className']) : '');

if (have_rows('slider')) : ?>
    <div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($wrapper_cls); ?> swiper banner-slider">
        <div class="swiper-wrapper">

            <?php foreach ($slider as $item) :
                $img_dc = $item['img_dc'];
                $img_mb = $item['img_mb'];
                $link   = $item['link'];         // Link
                $link_url    = is_array($link) && !empty($link['url']) ? esc_url($link['url']) : '';
                $link_title  = is_array($link) && !empty($link['title']) ? esc_html($link['title']) : '';
                $link_target = is_array($link) && !empty($link['target']) ? esc_attr($link['target']) : '_self';
            ?>
                <div class="swiper-slide ">
                    <div class="slide-inner">
                        <?php if ($link_url) : ?>
                            <a href="<?php echo  $link_url; ?>">
                            <?php endif; ?>
                            <?php if ($img_dc) : ?>
                                <div class="slide-media slider-dc">
                                    <?php echo  wp_get_attachment_image($img_dc, ''); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($img_mb) : ?>
                                <div class="slide-media slider-mb">
                                    <?php echo  wp_get_attachment_image($img_mb, ''); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($link_url) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Paginations & Arrows -->


    </div>
    <div class="swiper-pagination swiper-pagination--baner"></div>

<?php
else :
    // Opcjonalnie: fallback gdy nie ma slajdów
    echo '<div class="banner-swiper--empty">' . esc_html__('Brak slajdów do wyświetlenia.', 'your-textdomain') . '</div>';
endif;
