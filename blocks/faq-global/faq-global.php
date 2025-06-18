<?php

/**
 * Block Name: FAQ Global
 *
 * This is the template that displays the FAQ Global block.
 */
$style = get_field('styl');
if ($style == 1) :
    get_template_part('blocks/faq-global/faq-global-col', 'one');
elseif ($style == 2) :
    get_template_part('blocks/faq-global/faq-global-col', 'two');
endif;
