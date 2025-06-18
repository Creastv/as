<?php
$title = get_field('title');
$phone = get_field('phone_no');
$email = get_field('email');
$desc = get_field('desc');
$link = get_field('link');
if ($link):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif;
?>

<div class="b-info-contact">
    <?php if ($title) : ?>
        <div class="b-info-contact__item">
            <div class="b-info-contact__item__con">
                <h3> <?php echo $title; ?></h3>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($desc) : ?>
        <div class="b-info-contact__item">
            <div class="b-info-contact__item__con">
                <p> <?php echo $desc; ?></p>
            </div>
        </div>
    <?php endif; ?>

    <div class="b-info-contact__call">

        <?php if ($phone) : ?>
            <div class="b-info-contact__item">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.2502 14.8051V17.4301C19.2512 17.6738 19.2013 17.915 19.1037 18.1383C19.0061 18.3615 18.8629 18.562 18.6833 18.7267C18.5037 18.8915 18.2917 19.0169 18.0609 19.095C17.8301 19.173 17.5854 19.202 17.3427 19.1801C14.6502 18.8875 12.0639 17.9675 9.7915 16.4938C7.67735 15.1504 5.88492 13.358 4.5415 11.2438C3.06273 8.96114 2.14246 6.3622 1.85525 3.65758C1.83338 3.41562 1.86214 3.17175 1.93968 2.94151C2.01723 2.71126 2.14187 2.49969 2.30567 2.32025C2.46946 2.14082 2.66883 1.99746 2.89106 1.89929C3.1133 1.80113 3.35354 1.75031 3.5965 1.75008H6.2215C6.64614 1.74591 7.05781 1.89628 7.37979 2.17318C7.70176 2.45007 7.91206 2.8346 7.9715 3.25508C8.08229 4.09514 8.28777 4.91997 8.584 5.71383C8.70172 6.02702 8.7272 6.36738 8.65742 6.6946C8.58763 7.02182 8.4255 7.32218 8.19025 7.56008L7.079 8.67133C8.32461 10.8619 10.1384 12.6757 12.329 13.9213L13.4402 12.8101C13.6781 12.5748 13.9785 12.4127 14.3057 12.3429C14.6329 12.2731 14.9733 12.2986 15.2865 12.4163C16.0804 12.7126 16.9052 12.918 17.7452 13.0288C18.1703 13.0888 18.5585 13.3029 18.836 13.6304C19.1135 13.9579 19.2609 14.376 19.2502 14.8051Z"
                        stroke="#FD5B39" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="b-info-contact__item__con">
                    <a href="tel:<?php echo $phone; ?>">
                        <span class="label"><?php echo _e('Zadzwoń', 'go'); ?></span>
                        <?php echo $phone; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($email) : ?>
            <div class="b-info-contact__item">
                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.1668 6.00008C20.1668 4.99175 19.3418 4.16675 18.3335 4.16675H3.66683C2.6585 4.16675 1.8335 4.99175 1.8335 6.00008M20.1668 6.00008V17.0001C20.1668 18.0084 19.3418 18.8334 18.3335 18.8334H3.66683C2.6585 18.8334 1.8335 18.0084 1.8335 17.0001V6.00008M20.1668 6.00008L11.0002 12.4167L1.8335 6.00008"
                        stroke="#FD5B39" stroke-width="0.88" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="b-info-contact__item__con">
                    <a href="tel:<?php echo $email; ?>">
                        <span class="label"><?php echo _e('Napisz do nas', 'go'); ?></span>
                        <?php echo $email; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </div>



    <?php if ($link) : ?>
        <div class="b-info-contact__item">
            <a class="btn-rev" href="<?php echo esc_url($link_url); ?>"
                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        </div>
    <?php endif; ?>


</div>