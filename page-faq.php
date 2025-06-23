<?php
/* Template Name: FAQ/navigacja-sticky-sidebar
 * Template Post Type: page
 * 
 * */
get_header();
$nav = get_field('nawigacja');
?>
<?php get_template_part('templates-parts/header/header', 'title'); ?>
<div class="b-sticky-con">
    <div class="container">
        <div class="row">
            <div class="b-sticky-con__wraper">
                <div class="col-1">
                    <?php the_content(); ?>
                </div>
                <?php if ($nav) { ?>
                    <div class="col-1">
                        <div class="sticky-nav">
                            <h3>Spis treści</h3>
                            <?php echo $nav; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
