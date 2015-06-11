<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Magnigenie
 * @subpackage Geekery
 * @since Geekery 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<?php 
	// get sticky posts from DB
	$sticky = get_option( 'sticky_posts' );
	// check if there are any
	if ( !empty( $sticky ) ) {
		rsort($sticky);
	}
	if( is_front_page() && 1 == get_theme_mod( 'geekery_slider' ) && 0 < count( $sticky ) ) : ?>
	<div id="slider-wrap" class="owl-carousel">
		<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => 5, 'post__in' => $sticky );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
				<div class="item">
					<?php 
					if ( has_post_thumbnail() ): 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						$url = $thumb['0'];
					?>
					<?php 
					else: 
						$url= get_stylesheet_directory_uri() . '/images/default.jpg'; 
					endif; ?>
					<div class="post-content">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>"><img src="<?php  echo $url; ?>" alt="<?php the_title_attribute() ?>"></a>
				</div>
					
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	<?php $logo =  get_theme_mod( 'geekery_logo' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap clearfix">
			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php if( $logo !='' ): ?>
							<img src="<?php echo $logo; ?>">
						<?php else: ?>
							<?php bloginfo('name'); ?>
						<?php endif; ?>
					</a>
				</h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'geekery' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->				
		</div><!-- .inner-wrap header-wrap -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="inner-wrap">