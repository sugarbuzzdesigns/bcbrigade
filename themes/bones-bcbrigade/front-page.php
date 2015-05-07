<?php get_header(); ?>

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
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</section>	

	<section class="cf media-merch">
		<div class="wrap">
			<div class="d-1of2">
				<h2><hr>Watch<hr class="hr-right"></h2>
				<div class="video-wrap">
					<iframe width="550" height="309" src="https://www.youtube.com/embed/Wsn_2SR1N9s" frameborder="0" allowfullscreen></iframe>
				</div>					
				<div class="video-wrap">
					<iframe width="550" height="309" src="https://www.youtube.com/embed/llbn88Lun7o" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>		
			<div class="d-1of2">
				<h2><hr>Shop<hr class="hr-right"></h2>
				<div class="product d-1of2">
					<div class="product-wrap">
						<img src="http://briancollinsmusic.com/wp-content/uploads/2014/09/Heather_Red_HH_T-300x300.jpg" alt="">
					</div>
				</div>
				<div class="product d-1of2">
					<div class="product-wrap">
						<img src="http://briancollinsmusic.com/wp-content/uploads/2014/10/BC_IN_UK_TSHIRT_ADZ_BLUE-small-300x300.jpg" alt="">
					</div>
				</div>		
				<div class="product d-1of2">
					<div class="product-wrap">
						<img src="http://briancollinsmusic.com/wp-content/uploads/2014/09/Heather_Red_HH_T-300x300.jpg" alt="">
					</div>
				</div>
				<div class="product d-1of2">
					<div class="product-wrap">
						<img src="http://briancollinsmusic.com/wp-content/uploads/2014/10/BC_IN_UK_TSHIRT_ADZ_BLUE-small-300x300.jpg" alt="">
					</div>
				</div>				
			</div>	
		</div>
	</section>	

	<section class="cf membership_levels">
		<div class="wrap">
			<h2><hr>Socialize<hr></h2>
			<div class="d-1of2">
				<a class="twitter-timeline" href="https://twitter.com/officialbcb" data-widget-id="501590129476001792">Tweets by @officialbcb</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div class="d-1of2">
				<a class="twitter-timeline" href="https://twitter.com/officialbcb" data-widget-id="501590129476001792">Tweets by @officialbcb</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>			
		</div>
	</section>	

<?php get_footer(); ?>
