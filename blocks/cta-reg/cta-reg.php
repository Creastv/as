<?php
$image = get_field('kv');
$size = 'full';
?>
<div class="bl-kv">
    <svg id="bl-kv__ornament" xmlns="http://www.w3.org/2000/svg" width="1729" height="500.059" viewBox="0 0 1729 500.059">
        <path id="Trazado_56" data-name="Trazado 56" d="M3285.575,5755.89c16.719-.565,1729-460.059,1729-460.059H3940.314l-654.739,80.361Z" transform="translate(-3285.575 -5255.831)" fill="#edf8fd" />
        <path id="Trazado_58" data-name="Trazado 58" d="M3268,2597.163l713.613,40L3268,2725.868Z" transform="translate(-3266.846 -2597.163)" fill="#185ab1" />
    </svg>

    <div class="container">
        <div class="bl-kv__wraper">
            <div class="col">
                <?php
                if ($image) {
                    echo wp_get_attachment_image($image, $size);
                } ?>
            </div>
            <div class="col">

                <InnerBlocks />
            </div>
        </div>
    </div>

</div>