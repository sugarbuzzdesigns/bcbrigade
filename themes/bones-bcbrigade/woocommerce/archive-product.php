<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $current_user;

get_header( 'shop' ); ?>
<div id="content">

	<div id="hero" class="wrap">
		<img src="<?php bloginfo('template_directory'); ?>/library/images/heros/store-hero.jpg" />
	</div>

	<?php if(wp_is_mobile()){ ?>
	
		<div class="mobile-breadcrumb">
			<p>Mobile Store</p>
		</div>

	<?php } ?>	
		<div>	

		<?php if ( is_user_logged_in() ) {
			echo '<p>' . $current_user->membership_level->ID .'<p>';
			if($current_user->membership_level->ID != 1){ ?>
				<section class="wrap">
					<div id="special-offer">
						<a id="eagle-member-offer" href="#">
							<img src="http://staging.bcbrigade.com/wp-content/uploads/2015/06/eagle-chair.jpg" alt="">
						</a>
						<div class="info">
							<h2>SPECIAL OFFER</h2>
							<p>Upgrade your membership to <strong>Brigade Eagle Member</strong> and receive this special gift.</p>
							<small>** Your chair will be shipped to the address you signed up with. Please update your <a href="#">profile</a> if you need to make changes to your shipping address.</small>
							<a class="button cta" href="#">UPGRADE NOW!</a>
						</div>		
					</div>	
				</section>		
		<?php } }?> 			
		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
		

			<?php do_action( 'woocommerce_archive_description' ); ?>

			<?php if ( have_posts() ) : ?>

				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>
		</div>
	<!-- 	<?php
			/**
			 * woocommerce_sidebar hook
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?> -->
</div>
<?php get_footer( 'shop' ); ?>