<?php get_header(); ?>
<div id="content">
	<section id="hero" class="cf">
		<div class="wrap">
			<img src="<?php bloginfo('template_directory'); ?>/library/images/heros/music-hero.jpg" />
		</div>
	</section>	
	<div id="inner-content" class="wrap cf">
		<div class="entry-content entry">
			<div id="wrapper" class="d-1of2">
				<audio preload></audio>
				<ol class="playlist">
					<li><a href="#" data-buy-link="/product/keep-walking-on-mp3/" data-poster="<?php bloginfo('template_directory'); ?>/library/images/music/posters/keep-walking-on-icon_500x500.jpg" data-src="<?php bloginfo('template_directory'); ?>/library/audio/Keep_Walking_On.mp3">Keep Walking On</a></li>
					<li class="coming-soon">Coming in August</li>
					<li class="coming-soon">Coming in September</li>
				</ol>
			</div>	
			<div class="m-all t-all d-1of2 last-col song-extras">
				<div id="keep-walking-on" class="song active">
					<div class="lyrics selected">
						<h3>Lyrics</h3>
						<p class="verse">
							<span>Spent half my life just wishin</span>
							<span>Afraid of the chance I'd been given</span>
							<span>Thought I should ask for forgiveness</span>
							<span>For wanting more</span>						
						</p>	
								
						<p class="chorus">
							<span>I guess that when your searching for a sign</span>
							<span>Sometimes you gotta take look around outside</span>	
						</p>

						<p class="verse">
							<span>It's the only way to learn</span>
							<span>Which bridge to cross and which one to burn</span>
							<span>And you might not get there first and the road is long</span>
							<span>But keep walkin on</span>
						</p>

						<p class="verse">
							<span>Don't wanna say its been easy</span>
							<span>And sometimes my mind is still reelin'</span>
							<span>But I have to keep on believing </span>
							<span>That there's more</span>
						</p>

						<p class="chorus">
							<span>The truth is that you only have one soul</span>
							<span>And two feet to guide your way to walk through the doors</span>
						</p>

						<p class="verse">
							<span>It's the only way to learn</span>
							<span>Which bridge to cross and which one to burn</span>
							<span>And you might not get there first and the road is long</span>
							<span>But keep walkin on</span>
						</p>

						<p class="chorus">
							<span>Ready or not you know a change is gonna come</span>
							<span>It takes every ounce of faith to keep on keeping on keeping on </span>
						</p>

						<p class="chorus">
							<span>It's the only way to learn</span>
							<span>Which bridge to cross and which one to burn</span>
							<span>And you might not get there first and the road is long</span>
							<span>But keep walkin on</span>
						</p>

						<p class="outro">
							<span>(Step by step by step.... Ooo)</span>	
						</p>
					</div>		
					<div class="about">
						<h3>About</h3>
						<p>Living your life and not being afraid of taking a chance and making mistakes. That’s what this song is all about. You aren’t always going to be right in all your choices and not every path is an easy one, but you learn, you keep moving forward and you become stronger for it. The only real race is against time and the pace that you set is measured only by the passion and drive you contain in your heart. If you happen to breakdown or get lost along the way, its ok. You will still get there, but you gotta keep walking on.</p>
					</div>	
				</div>	
			</div>	
		</div>
	</div>
</div>

<script>
(function($){
	$(function() { 
		// Setup the player to autoplay the next track
		var a = audiojs.createAll({
			trackEnded: function() {
				var next = $('ol li.playing').next();
				if (!next.length) next = $('ol li').first();
				next.addClass('playing').siblings().removeClass('playing');
				audio.load($('a', next).attr('data-src'));
				audio.play();
			}
		});

		// Load in the first track
		var audio = a[0];
		first = $('ol a').data('src');
		$('ol li').first().addClass('playing');
		audio.load(first);
		var trackTitle = $('ol a').first().text();
		var buySongLink = $('ol a').first().data('buy-link');
		var trackPoster = $('ol a').first().data('poster');

		$('.buy-song').attr('href', buySongLink);
		$('.poster').attr('src', trackPoster);

		$('.audiojs h2').text(trackTitle);

		// Load in a track on click
		$('ol li').click(function(e) {
			e.preventDefault();
			if($(this).is('.coming-soon')){
				return;
			}
			$(this).addClass('playing').siblings().removeClass('playing');
			audio.load($('a', this).attr('data-src'));
			var trackTitle = $(this).text();
			$('.audiojs h2').text(trackTitle);			
			audio.play();
		});
		// Keyboard shortcuts
		$(document).keydown(function(e) {
			var unicode = e.charCode ? e.charCode : e.keyCode;
			// right arrow
			if (unicode == 39) {
				var next = $('li.playing').next();
			if (!next.length) next = $('ol li').first();
				next.click();
			// back arrow
			} else if (unicode == 37) {
				var prev = $('li.playing').prev();
			if (!prev.length) prev = $('ol li').last();
				prev.click();
			// spacebar
			} else if (unicode == 32) {
				audio.playPause();
			}
		});

		$('.info ul li').click(function(){
			if ($(this).is('.active')) {return;};
			$(this).toggleClass('active').siblings().toggleClass('active');


			var cat = $(this).data('info-toggle');
			if (cat === 'lyrics') {
				$('.song-extras .active .lyrics').addClass('selected');
				$('.song-extras .active .about').removeClass('selected');
			} else {
				$('.song-extras .active .about').addClass('selected');
				$('.song-extras .active .lyrics').removeClass('selected');
			}
		});
	});
})(jQuery);
</script>

<?php get_footer(); ?>