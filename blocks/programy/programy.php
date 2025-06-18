<?php
$programy = get_field('programy');
?>

<?php if (!empty($programy)) { ?>
<div class="b-programy">
    <h2 class=" text-center">Aktualnie realizowane programy</h2>
    <div class="b-program__wrap">

        <?php foreach ($programy as $program) {
                $image = $program['zdjecie'];
                if (!empty($program['zdjecie'])):
                    $image_url = $image['sizes']['post-futured'];
                endif;
            ?>
        <div class="b-program">
            <a href="<?php echo $program['link']; ?>">
                <div class="b-program__img" style="background-image: url(<?php echo $image_url; ?>)">
                    <div class="b-program__content">
                        <?php if ($program['tytul']) { ?>
                        <h3><?php echo $program['tytul']; ?></h3>
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.932007 0.705322H48.932V42.7053C48.932 46.019 46.2457 48.7053 42.932 48.7053H0.932007V0.705322Z"
                                fill="#F19106" />
                            <path d="M14.932 34.7053L34.932 14.7053M34.932 14.7053H14.932M34.932 14.7053V34.7053"
                                stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>