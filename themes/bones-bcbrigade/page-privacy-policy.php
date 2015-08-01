<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">
									<h1>BC Brigade Privacy Policy</h1>
									<p><strong>Last Updated on August 1st, 2015</strong></p>
									<p>Your privacy is important to BC Brigade, and its owner, Blue Light Entertainment LLC. If you choose to register with BC Brigade in order to become a member, the information stored on our website is limited to the information that you supply when registering. In certain situations we may request more information from you.</p>
									<p>We sometimes collect non-identifiable information from visits to our Web site to help us provide better service. For example, we may keep track of the domains from which people visit, and we also measure visitor activity on BC Brigade, but we do so in ways that keep the information non-identifiable. This information is sometimes known as "clickstream data”. BC Brigade, may use this data to analyze trends and statistics and to help us provide better service.</p>
									<p>We collect the information mentioned in the previous paragraphs through the use of various technologies, including one called "cookies". A cookie is a piece of data that a Web site can send to your browser, which may then be stored on your computer as an anonymous tag that identifies your computer but not you. You can set your browser to notify you before you receive a cookie, giving you the chance to decide whether to accept it. You can also set your browser to turn off cookies. If you do so, however, some Web site functions may not work properly. </p>
									<p>Please be aware that in certain circumstances, it is possible that personal information may be subject to disclosure pursuant to judicial or other government subpoenas, warrants, or orders. If we believe that you have broken our rules, we reserve the right to look at any potentially relevant content including, but not limited to, private messages in our system, IP addresses and any other information that may assist us in determining if rules were broken.</p>
								</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<?php //get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
