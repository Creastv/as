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


$chunks = array_chunk($faqs, ceil(count($faqs) / 2));
$colOne = $chunks[0];
$colTwo = $chunks[1];
$num = 1;
$num2 = count($colOne) + 1;

?>

<div id="faq-global">
    <div class="faq-global js">

        <div class="faq__wraper--col">
            <?php if ($colOne) { ?>
                <div class="col">
                    <?php foreach ($colOne as $acc) { ?>
                        <div class="accordion js">
                            <h3 class="question ">
                                <b><?php echo $num; ?>. <?php echo $acc['pytanie']; ?></b><span></span>
                            </h3>
                            <div class="answer">
                                <div>
                                    <?php echo $acc['odpowiedz']; ?>
                                </div>
                            </div>
                        </div>
                    <?php $num++;
                    } ?>
                </div>
            <?php } ?>
            <?php if ($colTwo) { ?>
                <div class="col">
                    <?php foreach ($colTwo as $acc) { ?>
                        <div class="accordion js">
                            <h3 class="question ">
                                <b><?php echo $num2; ?>. <?php echo $acc['pytanie']; ?></b><span></span>
                            </h3>
                            <div class="answer">
                                <div>
                                    <?php echo $acc['odpowiedz']; ?>
                                </div>
                            </div>
                        </div>
                    <?php $num2++;
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>