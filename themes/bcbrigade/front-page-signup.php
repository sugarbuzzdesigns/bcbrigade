<?php 
/*
Template Name: Pre-Release Sign Up
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">
	
		<img id="logo" src="<?php bloginfo('template_url'); ?>/assets/img/images/brigade-logo-distressed.png" alt="BC Brigade">

		<div id="signUp">
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
<?php get_footer(); ?>
