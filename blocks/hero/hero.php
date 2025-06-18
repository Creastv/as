<?php
$bg = get_field('bg');
$social_links = [
    'facebook'  => get_theme_mod('facebook_url', ''),
    'instagram' => get_theme_mod('instagram_url', ''),
    'youtube'  => get_theme_mod('youtube_url', ''),
    'tiktok'  => get_theme_mod('tiktok_url', ''),
];
$subtitle = get_field('subtitle');
$title = get_field('title');
?>


<section class="b-hero">
    <div class="b-hero__wrap">
        <div class="img">
            <?php echo wp_get_attachment_image($bg, 'full', false, array('class' => 'go-parallex')); ?>
        </div>
        <div class="kids">
            <img class="go-parallex-kids" src="<?php echo get_template_directory_uri(); ?>/src/img/dzieci3.png"
                alt="<?php the_title(); ?> ">
        </div>
        <div class="b-hero__content go-parallex-kids">
            <h1>
                <small><?php echo $subtitle; ?></small>
                <?php echo $title; ?>
            </h1>
            <InnerBlocks />
        </div>
        <svg class="b-hero__ornament " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
            <polyline fill="#00a3e2" ; points="1440 0 1440 300 0 300 0 214.5 1440 0" />
        </svg>
    </div>

</section>