<?php

/**
 * Block Name: FAQ Global
 *
 * This is the template that displays the FAQ Global block.
 */
$program = get_field('faq');
if ($program == 1) :
    $faqs = get_field('faq_aw', 'options');
elseif ($program == 2) :
    $faqs = get_field('faq_ao', 'options');
elseif ($program == 3) :
    $faqs = get_field('faq_adp', 'options');
elseif ($program == 4) :
    $faqs = get_field('faq_str_glowna', 'options');
elseif ($program == 5) :
    $faqs = get_field('faq_adp_25', 'options');
elseif ($program == 6) :
    $faqs = get_field('faq_aas', 'options');
endif;


$pPage = get_field('p_page');
if ($pPage != 0 && $pPage != null) {
    $faqs = array_slice($faqs, 0, $pPage);
}

$num = '1';
?>
<div id="faq-global">
    <div class="faq-global js">
        <div class="faq__wraper">
            <?php if ($faqs) { ?>
                <div class="col">
                    <?php foreach ($faqs as $faq) { ?>
                        <div class="accordion js">
                            <h3 class="question h5">
                                <b><?php echo $num; ?>. <?php echo $faq['pytanie']; ?></b><span></span>
                            </h3>
                            <div class="answer">
                                <div>
                                    <?php echo $faq['odpowiedz']; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        $num++;
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>