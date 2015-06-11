<?php get_header(); ?>
<?php global $pmpro_levels; ?>
	<section id="intro">
		<div class="wrap">
			<video id="intro_video" class="video-js vjs-default-skin" preload="auto" width="940" height="540">
			  <source src="<?php bloginfo('template_directory'); ?>/library/video/Welcome_To_The_Brigade_Introduction_960x540.mp4" type='video/mp4'>
			  <p class="vjs-no-js">
			    To view this video please enable JavaScript, and consider upgrading to a web browser
			    that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
			  </p>
			</video>	
		</div>	
	</section>


		<section id="hero" class="cf">
			<div class="wrap">
				<?php if ( !wp_is_mobile() ) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/library/images/heros/home-hero.jpg" />
				<?php } else { ?>	
					<img src="<?php bloginfo('template_directory'); ?>/library/images/brigade-logo-distressed.png" />
				<?php } ?>
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
				<div class="video-wrap m-all d-1of2">
					<video width="auto" height="auto" class="video-js vjs-default-skin" controls preload="auto" poster="<?php bloginfo('template_directory'); ?>/library/video/posters/BC_BRIGADE_COMING_SOON_LONG-poster.jpg">
						<source src="<?php bloginfo('template_directory'); ?>/library/video/BC_BRIGADE_COMING_SOON_LONG_960x540.mp4" type='video/mp4'>
						<p class="vjs-no-js">
							To view this video please enable JavaScript, and consider upgrading to a web browser
							that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
						</p>
					</video>
				</div>					
				<div class="video-wrap m-all d-1of2">
					<video width="auto" height="auto" class="video-js vjs-default-skin" controls preload="auto" poster="<?php bloginfo('template_directory'); ?>/library/video/posters/BC_BRIGADE_NRL-Lyrics-poster.jpg">
						<source src="<?php bloginfo('template_directory'); ?>/library/video/NEVER_REALLY_LEFT_Lyric_960x540.mp4" type='video/mp4'>
						<p class="vjs-no-js">
							To view this video please enable JavaScript, and consider upgrading to a web browser
							that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
						</p>
					</video>
				</div>
			</div>	
			<div class="m-all d-all see-all">
				<a href="#" class="button cta m-all">See All Videos</a>	
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
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="m-all d-1of4 product-wrap">
							<?php woocommerce_get_template_part( 'content', 'product' ); ?>
						</div>
						<?php endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
				?>	
				<div class="m-all d-all see-all">
					<a class="see-all-products button cta m-all" href="#">See All Products</a>
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
				<h5>Follow BC on Twitter</h5>				
			</div>
			<div class="d-1of3">
				<a href="">
					<img src="<?php bloginfo('template_directory'); ?>/library/images/social/homepage/social-instagram.png" alt="">
				</a>
				<h5>Follow BC on Instagram</h5>				
			</div>
			<div class="d-1of3">
				<a href="">
					<img src="<?php bloginfo('template_directory'); ?>/library/images/social/homepage/social-fb.png" alt="">
				</a>
				<h5>Follow BC on Facebook</h5>				
			</div>	
		</div>
	</section>
<?php get_footer(); ?>
