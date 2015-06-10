<?php get_header(); ?>
<?php global $pmpro_levels; ?>
	<section id="intro">
		<div class="wrap">
			<video id="intro_video" class="video-js vjs-default-skin" preload="auto" width="940" height="540">
			  <source src="http://sugarbuzzdesigns.com/files/video-js/Welcome_To_The_Brigade_Introduction.mp4" type='video/mp4'>
			  <p class="vjs-no-js">
			    To view this video please enable JavaScript, and consider upgrading to a web browser
			    that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
			  </p>
			</video>	
		</div>	
	</section>

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
					<video class="video-js vjs-default-skin" controls preload="auto">
						<source src="http://sugarbuzzdesigns.com/files/video-js/Welcome_To_The_Brigade_Introduction.mp4" type='video/mp4'>
						<p class="vjs-no-js">
							To view this video please enable JavaScript, and consider upgrading to a web browser
							that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
						</p>
					</video>
				</div>					
				<div class="video-wrap d-1of2">
					<video class="video-js vjs-default-skin" controls preload="auto">
						<source src="http://sugarbuzzdesigns.com/files/video-js/Welcome_To_The_Brigade_Introduction.mp4" type='video/mp4'>
						<p class="vjs-no-js">
							To view this video please enable JavaScript, and consider upgrading to a web browser
							that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
						</p>
					</video>
				</div>
			</div>	
			<div class="d-all see-all">
				<a href="#" class="button cta">See All Videos</a>	
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
						<div class="d-1of4">
							<?php woocommerce_get_template_part( 'content', 'product' ); ?>
						</div>
						<?php endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
				?>	
				<div class="d-all see-all">
					<a class="see-all-products button cta" href="#">See All Products</a>
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
