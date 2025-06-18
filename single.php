<?php
get_header();
while (have_posts()) : the_post();
	get_template_part('templates-parts/content/content', 'post');
	echo '<br>';
	if (is_singular('post')):
		get_template_part('templates-parts/parts/recomended-posts');
	endif;
endwhile;
get_footer();
