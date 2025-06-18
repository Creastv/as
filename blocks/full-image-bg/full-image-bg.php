<?php
$bg = get_field('img');
?>

<div class="b-full-image">

    <svg class="b-full-image-ornament" width="3735" height="208" viewBox="0 0 3735 208" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M3735 0V208H1815L3735 0Z" fill="#00A3E2" />
    </svg>

    <div class="img">
        <?php echo wp_get_attachment_image($bg, 'full'); ?>
    </div>
    <svg width="201" height="44" viewBox="0 0 201 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_75_198)">
            <path d="M0 0V43.5L200.38 0H0Z" fill="#EBA120" />
        </g>
        <defs>
            <clipPath id="clip0_75_198">
                <rect width="200.38" height="43.5" fill="white" />
            </clipPath>
        </defs>
    </svg>

</div>