<?php

/**
 * Banner Slider (ACF Block)
 * Zakładam, że ten plik jest dołączany jako render_template Twojego bloku ACF.
 */

// Unikalne ID/klasy dla izolacji styli i nawigacji
$block_id    = 'banner-swiper-' . ($block['id'] ?? uniqid());
$wrapper_cls = 'banner-swiper ' . (!empty($block['className']) ? esc_attr($block['className']) : '');

if (have_rows('slider')) : ?>
    <div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($wrapper_cls); ?> swiper banner-slider">
        <div class="swiper-wrapper">
            <?php
            while (have_rows('slider')) : the_row();
                $img_id = get_sub_field('img');       // return_format = id
                $text   = get_sub_field('tekst');     // WYSIWYG
                $link   = get_sub_field('link');      // array: url, title, target

                // Obrazek (możesz zmienić 'full' na inny rozmiar)
                $image_html = $img_id ? wp_get_attachment_image($img_id, 'full', false, ['class' => 'slide-image', 'loading' => 'lazy']) : '';

                // Link
                $link_url    = is_array($link) && !empty($link['url']) ? esc_url($link['url']) : '';
                $link_title  = is_array($link) && !empty($link['title']) ? esc_html($link['title']) : '';
                $link_target = is_array($link) && !empty($link['target']) ? esc_attr($link['target']) : '_self';
            ?>
                <div class="swiper-slide ">
                    <div class="slide-inner">
                        <?php if ($image_html) : ?>
                            <div class="slide-media">
                                <?php echo $image_html; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($text || $link_url) : ?>
                            <div class="slide-content">
                                <?php if ($text) : ?>
                                    <div class="slide-text">
                                        <?php echo wp_kses_post($text); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($link_url) : ?>
                                    <div class="slide-actions">
                                        <a class="btn-main" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"
                                            rel="<?php echo $link_target === '_blank' ? 'noopener' : 'nofollow'; ?>">
                                            <?php echo $link_title ? $link_title : esc_html__('Zobacz więcej', 'your-textdomain'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Paginations & Arrows -->
        <div class="swiper-pagination swiper-pagination--baner"></div>

    </div>

<?php
else :
    // Opcjonalnie: fallback gdy nie ma slajdów
    echo '<div class="banner-swiper--empty">' . esc_html__('Brak slajdów do wyświetlenia.', 'your-textdomain') . '</div>';
endif;
