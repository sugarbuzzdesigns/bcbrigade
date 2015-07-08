<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(''); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title('');
		} else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/app.css" />
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	
	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">
	

	
	<nav class="tab-bar show-for-small-only">
		<section class="left-small">
			<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
		</section>
		<section class="middle tab-bar-section">
			
			<h1 class="title"><?php bloginfo( 'name' ); ?></h1>

		</section>
	</nav>


<section class="container" role="document">