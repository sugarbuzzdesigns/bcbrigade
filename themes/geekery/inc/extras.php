<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Magnigenie
 * @subpackage Geekery
 * @since Geekery 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function geekery_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'geekery_page_menu_args' );

/**
 * Removing the default style of wordpress gallery
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Setting the comment section for pages and custom post type as off by default
 */
function geekery_default_comments_off( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'geekery_default_comments_off' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function geekery_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'geekery_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function geekery_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'geekery' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'geekery_wp_title', 10, 2 );


add_action('wp_head', 'geekery_internal_css');
/**
 * Hooks the Custom Internal CSS to head section
 */
function geekery_internal_css() {


	if ( get_background_image() || get_background_color() ) :
		$image = get_background_image();	
		$color = get_background_color();

		$style = $color ? "background-color: #$color;" : '#EAEAEA';

			if ( $image ) {
				$image = " background-image: url('$image');";

				$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
				if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
					$repeat = 'repeat';
				$repeat = " background-repeat: $repeat;";

				$position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
				if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
					$position = 'left';
				$position = " background-position: top $position;";

				$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
				if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
					$attachment = 'scroll';
				$attachment = " background-attachment: $attachment;";

				$style .= $image . $repeat . $position . $attachment;
			}
		?>
		<style type="text/css" id="custom-background-css">
		body.custom-background { background: none !important; } #content { <?php echo trim( $style ); ?> }
		</style>
		<?php
	endif;
}
function geekery_filter_pre_get_posts( $query ) {
	if( $query->is_main_query() && $query->is_front_page() )
		$query->set( 'post__not_in', get_option( 'sticky_posts' ) );
	return $query;
}
add_action( 'pre_get_posts', 'geekery_filter_pre_get_posts' );