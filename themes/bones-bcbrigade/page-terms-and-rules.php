<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">
									<h1>Rules of Conduct on BCB</h1>
									<p><strong>Last Revised August 1, 2015</strong></p>
									<p>GENERAL RULES PHILOSOPHY: </p>
									<p><strong>How We Handle Things</strong>:  We do not search the forums looking for problems. We depend on the members to report problem posts to <a href="mailto:forum@bcbrigade.com">forum@bcbrigade.com<a>. The forum moderator may simply delete a post or might send you a notice/warning to remind you of the rules. If a post is really over the line in our opinion, or if we notice that you have to be reminded too often about our rules, you may be suspended or banned, depending on the circumstances. Please don't report posts that don't break our rules. Just because you don't like what was written isn't a reason to report the post. Such reports should only be made when a rule here is broken.</p>

									<p><strong>THE RULES</strong></p>

									<p>1. <strong>Don't Act Like a Jerk</strong>.  Antagonizing other members or resorting to personal attacks is the most common reason for moderators to take action. Say what you need to say without insulting someone else. Following someone from thread to thread to argue with them or insult them is not allowed. Private Messages or emails are private but the same "antagonizing" rule applies. Posting someone's PM, email or personal information without expressed written permission is not allowed.</p>

									<p>2. <strong>No bashing/bullying/harassing of other forum members for any reason</strong></p>

									<p>3. <strong>Not Allowed</strong>.  Bigoted remarks, religious or political comments, trademark violations and copyright violations are not allowed. Photos and posts must be safe for work and for people as young as 13 years old. You may not offer to sell or promote any item that violates a trademark, even if you note that it is a replica, clone, copy or fake. This is illegal.</p>

									<p>4. <strong>No Spam</strong>. Please don't come her to post about your personal websites or business unless it is related to the BC Brigade in some way.</p>

									<p>5. <strong>Only one user account per member</strong>. Multiple User IDs are not allowed and will convert a temporary suspension into a permanent ban if you open a new user account while under suspension. If you want to change your user name you need to contact an administrator to do that for you.</p>

									<p>6. <strong>Do not argue with moderators.</strong></p>

									<p>7. <strong>Legal threats</strong>. If you threaten or insinuate legal action against BC Brigade or its staff, your time on the BC Brigade forum is over. </p>

									<p>8. <strong>We don't delete user accounts</strong>. If you get booted or are unhappy with us, don’t ask us to delete your account or posts.</p>

									<p><strong>SUMMARY</strong>: Your membership to the BC Brigade is taken very seriously. If you don’t agree with the rules, please do not post in the forums. Although we value every member and want you to be here, if we feel that your membership hurts the experience for others, we may choose to suspend or ban you. We reserve the right to suspend or ban any member for any reason, not limited to the above rules.</p>
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
