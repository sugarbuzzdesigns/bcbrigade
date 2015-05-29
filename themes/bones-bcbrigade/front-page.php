<?php get_header(); ?>
<?php global $pmpro_levels; ?>
	<section id="hero" class="cf">
		<div class="wrap">
			<!--<ul class="bxslider">
			  <li><img src="<?php bloginfo('template_directory'); ?>/library/images/slider/dublin.jpg" /></li>
			  <li><img src="<?php bloginfo('template_directory'); ?>/library/images/slider/dublin.jpg" /></li>
			  <li><img src="<?php bloginfo('template_directory'); ?>/library/images/slider/dublin.jpg" /></li>
			  <li><img src="<?php bloginfo('template_directory'); ?>/library/images/slider/dublin.jpg" /></li>
			</ul> -->
			<img src="<?php bloginfo('template_directory'); ?>/library/images/heros/home-hero.jpg" />
		</div>
	</section>

	<section class="cf membership_levels">
		<div class="wrap">
			<h2><hr>Become A Member<hr></h2>
			<?php echo do_shortcode('[pmpro_levels]'); ?>
		</div>
	</section>	

	<section class="cf media">
		<div class="wrap">
			<div class="d-all watch">
				<h2><hr>Watch<hr class="hr-right"></h2>
				<div class="video-wrap d-1of2">
					<iframe width="550" height="309" src="https://www.youtube.com/embed/Wsn_2SR1N9s" frameborder="0" allowfullscreen></iframe>
				</div>					
				<div class="video-wrap d-1of2">
					<iframe width="550" height="309" src="https://www.youtube.com/embed/llbn88Lun7o" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>		
		</div>
	</section>	

	<section class="cf shop">
		<div class="wrap">
			<div class="d-all shop">
				<h2><hr>Shop<hr class="hr-right"></h2>
					<?php $args = array('post_type' => 'product', 'posts_per_page' => 12);
					$loop = new WP_Query( $args );
					
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							woocommerce_get_template_part( 'content', 'product' );
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
				?>	
				<div class="d-all">
					<a class="see-all-products" href="#">See All Products</a>
				</div>			
			</div>			
		</div>
	</section>	

	<section class="cf socialize">
		<div class="wrap">
			<h2><hr>Socialize<hr></h2>
			<div class="d-1of3">
				<a href="">
					<img src="<?php bloginfo('template_directory'); ?>/library/images/social/homepage/social-twitter.png" alt="">
				</a>
			</div>
			<div class="d-1of3">
				<a href="">
					<img src="<?php bloginfo('template_directory'); ?>/library/images/social/homepage/social-instagram.png" alt="">
				</a>
			</div>
			<div class="d-1of3">
				<a href="">
					<img src="<?php bloginfo('template_directory'); ?>/library/images/social/homepage/social-fb.png" alt="">
				</a>
			</div>			
<!-- 			<div class="d-1of2">
				<a class="twitter-timeline" href="https://twitter.com/officialbcb" data-widget-id="501590129476001792">Tweets by @officialbcb</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div class="d-1of2 last-col">
				<div class="fb-page" data-href="https://www.facebook.com/officialbriancollinsband" data-width="100%" data-height="500px" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/officialbriancollinsband"><a href="https://www.facebook.com/officialbriancollinsband">Brian Collins</a></blockquote></div></div>
				<?php echo do_shortcode( '[fts instagram instagram_id=1112679586 type=user]' ); ?>
			</div>	 -->		
		</div>
		<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
	</section>	

<?php get_footer(); ?>
