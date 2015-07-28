<?php get_header(); ?>
<div id="content">
	<section id="hero" class="cf">
		<div class="wrap">
			<!-- <img src="<?php bloginfo('template_directory'); ?>/library/images/heros/videos-hero.jpg" /> -->
		</div>
	</section>	
	<div id="inner-content" class="wrap cf">		
		<div class="entry-content entry">
			<div class="news_announcements">
				<div class="d-1of2 news">
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
				<div class="d-1of2 announcements">
					<h2>Announcements</h2>
					<div class="grid">
					<?php 
						$announce_id_obj = get_category_by_slug( 'announcements' ); 
						$announceObjId = $announce_id_obj->term_id;
					?>
					<?php $args = array( 'post_type' => 'post', 'cat' => $announceObjId, 'posts_per_page' => 6); ?>

					<?php $custom_query = new WP_Query($args); if (have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post(); ?>
					
						<div class="announcement d-1of2 m-all grid-item">
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

					<script>
					(function($){
						$(function(){
							$('.grid').masonry({
							  // options
							  itemSelector: '.grid-item'
							});							
						});
					})(jQuery)
					</script>					
				</div>	
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>