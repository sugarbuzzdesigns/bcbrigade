	<?php if ( is_user_logged_in() ) { ?>
	<?php get_header(); ?>
	<?php global $pmpro_levels; ?>
		<section id="intro">
			<div class="wrap">
				<a href="#" class="close">
					<i class="fa fa-close"></i>
				</a>
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

		<section class="cf news_announcements">
			<div class="wrap">
				<div class="d-1of2">
					<h2>News</h2>
					<?php 
						$news_id_obj = get_category_by_slug( 'news' ); 
						$newsObjId = $news_id_obj->term_id;
					?>
					<?php $args = array( 'post_type' => 'post', 'cat' => $newsObjId, 'posts_per_page' => 4); ?>

					<?php $custom_query = new WP_Query($args); if (have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="news-story">
						<div class="news-thumb">
							<?php if(has_post_thumbnail()) { $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbname' ); echo '<img src="' . $image_src[0] . '" width="100%" />'; } ?>
						</div>
						<div class="news-content">
							<small><?php the_date(); ?></small>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php the_content(); ?>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); endif; ?>					
				</div>
				<div class="d-1of2">
					<h2>Announcements</h2>
					<?php 
						$announce_id_obj = get_category_by_slug( 'announcements' ); 
						$announceObjId = $announce_id_obj->term_id;
					?>
					<?php $args = array( 'post_type' => 'post', 'cat' => $announceObjId, 'posts_per_page' => 6); ?>

					<?php $custom_query = new WP_Query($args); if (have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="announcement d-1of2">
						<div class="announcement-content">
							<div class="inner">
								<?php // the_date('Y m d', '<small>', '</small>'); ?>
								<div class="date">
									<span class="month"><?php the_time('F'); ?></span>
									<span class="day"><?php the_time('jS'); ?></span>
								</div>
								<div class="content">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php the_content(); ?>
								</div>	
							</div>	
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); endif; ?>					
				</div>
			</div>
		</section>		

		<section class="cf media gated">
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

		<section class="cf shop gated">
			<div class="wrap">
				<div class="d-all shop">
					<h2><hr>Shop<hr class="hr-right"></h2>
						<?php $args = array('post_type' => 'product', 'posts_per_page' => 4);
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
	<?php } else { ?>
	<?php get_header('pre-release'); ?>
	<div class="row">
		<div class="m-all t-all d-all" role="main">
		
			<img id="logo" class="animated fadeInDown" src="<?php bloginfo('template_url'); ?>/library/images/brigade-logo-distressed.png" alt="BC Brigade">

			<div id="signUp" class="animated fadeInUp">
				<h4>BC Brigade will be launching soon</h4>
				<p>Get an email notification when we're ready!</p>
				
				<!-- Begin MailChimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
				<style type="text/css">
					#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
					/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
					   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
					   #mc_embed_signup input[type="submit"] {
							width: 100%;
							background: #486145;
							text-transform: uppercase;
					   }

					   #mc_embed_signup div.mce_inline_error {
					   		margin-bottom: 0;
					   }

					   #mc_embed_signup input {
					   		border: solid 1px #d3d3d3;
					   		background: #d3d3d3;
					   }

					   #mc_embed_signup input:focus {
					   		border-color: #c4c2c2;
					   }

					   #mc_embed_signup .button:hover {
					   		background: #344831;
					   }

					   #mc_embed_signup .mc-field-group {
					   		width: 100%;
					   }

					   #mc_embed_signup form {
					   	padding: 10px 10px 10px 3%;
					   }
				</style>
				<div id="mc_embed_signup">
				<form action="//briancollinsmusic.us9.list-manage.com/subscribe/post?u=0f28c47121299de26b0cc6ff0&amp;id=614cd8e133" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				    <div id="mc_embed_signup_scroll">
					
				<div class="mc-field-group">
					<label for="mce-EMAIL">Email Address </label>
					<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
				</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_0f28c47121299de26b0cc6ff0_614cd8e133" tabindex="-1" value=""></div>
				    </div>
				    <div class="clear"><input type="submit" value="Notify Me" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->
			</div>

		</div>
	</div>
	<?php get_footer('pre-release'); ?>

	<?php } ?>