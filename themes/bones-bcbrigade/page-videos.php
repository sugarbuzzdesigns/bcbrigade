<?php get_header(); ?>
<div id="content">
	<section id="hero" class="cf">
		<div class="wrap">
			<img src="<?php bloginfo('template_directory'); ?>/library/images/heros/videos-hero.jpg" />
		</div>
	</section>	
	<div id="inner-content" class="wrap cf watch">		
		<div class="entry-content entry">
			<div class="video-wrap m-all d-1of2">
				<h2 class="video-title">Brian Collins Live and in Concert</h2>
				<video width="auto" height="auto" class="video-js vjs-default-skin" controls preload="auto">
					<source src="<?php bloginfo('template_directory'); ?>/library/video/BC-CRCMF_rev780.mp4" type='video/mp4'>
					<p class="vjs-no-js">
						To view this video please enable JavaScript, and consider upgrading to a web browser
						that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					</p>
				</video>
			</div>		
			<div class="video-wrap m-all d-1of2">
				<h2 class="video-title">Shine A Little Love</h2>
				<video width="auto" height="auto" class="video-js vjs-default-skin" controls preload="auto" poster="<?php bloginfo('template_directory'); ?>/library/video/posters/shine-a-little-love.jpg">
					<source src="<?php bloginfo('template_directory'); ?>/library/video/shine-a-little-love-rough-cut.mp4" type='video/mp4'>
					<p class="vjs-no-js">
						To view this video please enable JavaScript, and consider upgrading to a web browser
						that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					</p>
				</video>
			</div>			
			<div class="video-wrap m-all d-1of2">
				<h2 class="video-title">Welcome to BC Brigade</h2>
				<video width="auto" height="auto" class="video-js vjs-default-skin" controls preload="auto" poster="<?php bloginfo('template_directory'); ?>/library/video/posters/BC_BRIGADE_COMING_SOON_LONG-poster.jpg">
					<source src="<?php bloginfo('template_directory'); ?>/library/video/BC_BRIGADE_COMING_SOON_LONG_960x540.mp4" type='video/mp4'>
					<p class="vjs-no-js">
						To view this video please enable JavaScript, and consider upgrading to a web browser
						that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					</p>
				</video>
			</div>					
			<div class="video-wrap m-all d-1of2">
				<h2 class="video-title">Never Really Left</h2>
				<video width="auto" height="auto" class="video-js vjs-default-skin" controls preload="auto" poster="<?php bloginfo('template_directory'); ?>/library/video/posters/BC_BRIGADE_NRL-Lyrics-poster.jpg">
					<source src="<?php bloginfo('template_directory'); ?>/library/video/NEVER_REALLY_LEFT_Lyric_960x540.mp4" type='video/mp4'>
					<p class="vjs-no-js">
						To view this video please enable JavaScript, and consider upgrading to a web browser
						that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					</p>
				</video>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>