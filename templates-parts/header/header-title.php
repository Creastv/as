<?php
$title = get_field('display_title', get_the_ID());
$customTitle = get_field('custom_title', get_the_ID());



?>
<?php if ($title || is_home() || is_archive() || is_search() || is_tag() || $customTitle && $customTitle['title']): ?>
	<header class="entry-header text-center">

		<?php if ($title || is_home() || is_archive() || is_search() || is_tag()): ?>
			<div class="entry-header__wrap">
				<span class="entry-label">
					<?php if (is_category()) :
						single_cat_title();
					elseif (is_tax()) :
						single_tag_title();
					elseif (get_post_type(get_the_ID()) == 'nasze-specjalizacje' && is_singular('nasze-specjalizacje')) :
						the_title();
					elseif (get_post_type(get_the_ID()) == 'zespol') :
						_e('Prelegenci', 'go');

					elseif (is_404()) :
						_e('404', 'go');
					elseif (is_search()) :
						_e('Wyniki wyszukiwania', 'go');
					elseif (is_page()) :
						the_title();
					elseif (is_tag()) :
						single_tag_title();

					elseif (is_author()) :
						the_post();
						printf(__('%s', 'go'), get_the_author());
						rewind_posts();
					elseif (is_day()) :
						printf(__('Dzień: %s', 'go'), '<span>' . get_the_date() . '</span>');
					elseif (is_month()) :
						printf(__('Miesiąc: %s', 'go'), '<span>' . get_the_date('F Y') . '</span>');
					elseif (is_year()) :
						printf(__('Rok: %s', 'go'), '<span>' . get_the_date('Y') . '</span>');
					elseif (is_tax('post_format', 'post-format-aside')) :
						_e('Asides', 'go');
					elseif (is_tax('post_format', 'post-format-image')) :
						_e('Images', 'go');
					elseif (is_tax('post_format', 'post-format-video')) :
						_e('Videos', 'go');
					elseif (is_tax('post_format', 'post-format-quote')) :
						_e('Quotes', 'go');
					elseif (is_tax('post_format', 'post-format-link')) :
						_e('Links', 'go');
					else :
						_e('Aktualności', 'go');
					endif; ?>
				</span>
				<h1 class="entry-title">
					<?php if (is_category()) :
						single_cat_title();
					elseif (is_tax()) :
						single_tag_title();
					elseif (get_post_type(get_the_ID()) == 'nasze-specjalizacje' && is_singular('nasze-specjalizacje')) :
						the_title();
					elseif (get_post_type(get_the_ID()) == 'zespol') :
						_e('Prelegenci', 'go');

					elseif (is_404()) :
						_e('404', 'go');
					elseif (is_search()) :
						_e('Wyniki wyszukiwania', 'go');
					elseif (is_page()) :
						the_title();
					elseif (is_tag()) :
						single_tag_title();

					elseif (is_author()) :
						the_post();
						printf(__('%s', 'go'), get_the_author());
						rewind_posts();
					elseif (is_day()) :
						printf(__('Dzień: %s', 'go'), '<span>' . get_the_date() . '</span>');
					elseif (is_month()) :
						printf(__('Miesiąc: %s', 'go'), '<span>' . get_the_date('F Y') . '</span>');
					elseif (is_year()) :
						printf(__('Rok: %s', 'go'), '<span>' . get_the_date('Y') . '</span>');
					elseif (is_tax('post_format', 'post-format-aside')) :
						_e('Asides', 'go');
					elseif (is_tax('post_format', 'post-format-image')) :
						_e('Images', 'go');
					elseif (is_tax('post_format', 'post-format-video')) :
						_e('Videos', 'go');
					elseif (is_tax('post_format', 'post-format-quote')) :
						_e('Quotes', 'go');
					elseif (is_tax('post_format', 'post-format-link')) :
						_e('Links', 'go');
					else :
						_e('Aktualności', 'go');
					endif; ?>
				</h1>
			</div>
		<?php else : ?>
			<div class="entry-header__wrap">
				<?php if (!empty($customTitle['label'])): ?>
					<span class="entry-label"><?php echo $customTitle['label']; ?></span>
				<?php endif; ?>
				<?php if (!empty($customTitle['title'])): ?>
					<h1 class="entry-title">
						<?php echo $customTitle['title']; ?>
					</h1>
				<?php endif; ?>
			</div>
			<?php if (!empty($customTitle['description'])): ?>
				<div class="entry-desc">
					<?php echo $customTitle['description']; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if (is_category()) : ?>
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			<?php the_archive_description('<div class="entry-desc">', '</div>'); ?>
		<?php endif; ?>
		<?php if (is_home() || is_category()): ?>
			<?php
			$navLocation = 'secundary_menu';
			$temp_menu = wp_nav_menu(array(
				'theme_location'  => $navLocation,
				'menu_id'           => '',
				'menu_class'       => 'archive-cat container',
				'container'      => false,
				'echo'           => false,
			));
			echo $temp_menu;
			?>

		<?php endif; ?>

	</header>
<?php endif; ?>