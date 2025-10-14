<?php
function enqueue_woocommerce_ajax_script()
{
	if (function_exists('is_woocommerce')) {
		wp_enqueue_script('wc-cart-fragments');
	}
}
add_action('wp_enqueue_scripts', 'enqueue_woocommerce_ajax_script');

require_once get_template_directory() . '/func/enqueue-styles.php';
require_once get_template_directory() . '/func/enqueue-scripts.php';
require get_template_directory() . '/func/clean-up.php';
require get_template_directory() . '/blocks/blocks.php';
require get_template_directory() . '/func/wp-cuztomize.php';


add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_image_size('post-futured', 300, 300, array('center', 'center'), true);
add_image_size('product-image', 600, 600, array('center', 'center'), true);

if (!function_exists('go_register_nav_menu')) {
	function go_register_nav_menu()
	{
		register_nav_menus(array(
			'primary_menu' => __('Primary Menu', 'go'),
			'secundary_menu' => __('Aktualności', 'go'),
		));
	}
	add_action('after_setup_theme', 'go_register_nav_menu', 0);
}
function go_custom_logo_setup()
{
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'go_custom_logo_setup');

function go_widgets_init()
{
	register_sidebar(array(
		'name'          => __('sidebar', 'go'),
		'id'            => 'sidebar',
		'before_widget' => '<div id="%1$s" class="calaps widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('footer one', 'go'),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="calaps widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'name'          => __('footer two', 'go'),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class=" widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action('widgets_init', 'go_widgets_init');


// gutenberg editor
function add_block_editor_assets()
{
	wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/src/css/go-admin.css');
}
add_action('enqueue_block_editor_assets', 'add_block_editor_assets', 10, 0);


// Paginacja
function pagination_bars()
{
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;
	$big = 999999999; // need an unlikely integer
	if ($total_pages > 1) {
		$current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => $current_page,
			'total' => $total_pages,
		));
	}
}
// Excerpt changing 3 dots
function new_excerpt_more($more)
{
	return;
}
add_filter('excerpt_more', 'new_excerpt_more');

// Excerpt
function wp_example_excerpt_length($length)
{
	return 30;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

function custom_excerpt($length = 55, $more = '...')
{
	global $post;
	$content = wp_strip_all_tags(get_the_content()); // Pobranie treści posta bez HTML
	$words = explode(' ', $content, $length + 1); // Podział na słowa

	if (count($words) > $length) {
		array_pop($words); // Usunięcie ostatniego elementu (nadmiarowego)
		$content = implode(' ', $words) . $more; // Połączenie i dodanie "..."
	} else {
		$content = implode(' ', $words); // Połączenie bez zmian
	}

	return $content;
}


if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Ustawienia szablonu',
		'menu_title' => 'Ustawienia szablonu',
		'parent_slug' => 'themes.php',
	));
	acf_add_options_page(array(
		'page_title' => 'FAQ',
		'menu_title' => 'FAQ',
		'parent_slug' => 'themes.php',
	));
}


function enable_webp_upload($mime_types)
{
	$mime_types['webp'] = 'image/webp';
	return $mime_types;
}
add_filter('upload_mimes', 'enable_webp_upload');

// Wyłączenie komentarzy wszędzie
add_action('init', function() {
    // Wyłączenie komentarzy w panelu i front-endzie
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
    
    // Wyłączenie trackbacków
    remove_post_type_support('post', 'trackbacks');
    remove_post_type_support('page', 'trackbacks');
});

// Ukrycie istniejących formularzy komentarzy
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

// Usunięcie menu komentarzy w panelu
add_action('admin_menu', function() {
    remove_menu_page('edit-comments.php');
});

// Przekierowanie prób wejścia na stronę komentarzy
add_action('admin_init', function() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
});

