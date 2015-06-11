<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Magnigenie
 * @subpackage Geekery
 * @since Geekery 1.0
 */
?>

		</div><!-- .inner-wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'geekery_credits' ); ?>
			<?php _e( 'Proudly  powered by ', 'geekery' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php _e( 'WordPress', 'geekery' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'geekery' ), 'Geekery', '<a href="'.esc_url('http://magnigenie.com/').'" rel="designer">Magnigenie</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>