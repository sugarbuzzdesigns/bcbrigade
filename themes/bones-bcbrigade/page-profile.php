<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */

/* Get user info. */
global $current_user, $wp_roles, $pmpro_levels;

/* Load the registration file. */
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['birthday'] ) )
        update_user_meta( $current_user->ID, 'birthday', esc_attr( $_POST['birthday'] ) );    
    if ( !empty( $_POST['address'] ) )
        update_user_meta( $current_user->ID, 'address', esc_attr( $_POST['address'] ) );
	if ( !empty( $_POST['city'] ) )
	        update_user_meta( $current_user->ID, 'city', esc_attr( $_POST['city'] ) );
	if ( !empty( $_POST['country'] ) )
	        update_user_meta( $current_user->ID, 'country', esc_attr( $_POST['country'] ) );	    
	if ( !empty( $_POST['zip'] ) )
	        update_user_meta( $current_user->ID, 'zip', esc_attr( $_POST['zip'] ) );            
    if ( !empty( $_POST['state'] ) )
        update_user_meta( $current_user->ID, 'state', esc_attr( $_POST['state'] ) );

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );

        exit;
    }
}
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">
						<div class="left-sidebar m-all t-1of3 d-2of7">
							<div class="profile-info">
								<?php echo get_avatar( $current_user->ID, 200 ); ?> 
								<p><strong>Username:</strong> <?php the_author_meta( 'user_login', $current_user->ID ); ?></p>
								<p><strong>First Name:</strong> <?php the_author_meta( 'first_name', $current_user->ID ); ?></p>
								<p><strong>Last Name:</strong> <?php the_author_meta( 'last_name', $current_user->ID ); ?></p>
							</div>
						</div>

						<div class="m-all t-2of3 d-5of7 cf" id="main" role="main">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						    <div id="post-<?php the_ID(); ?>">
						        <div class="entry-content entry">
						            <?php the_content(); ?>
						            <?php if ( !is_user_logged_in() ) : ?>
						                    <p class="warning">
						                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
						                    </p><!-- .warning -->
						            <?php else : ?>
						                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
						                <form method="post" id="adduser" action="<?php the_permalink(); ?>">
											<div class="general-info profile-section">
												<h3>General Info</h3>

							                    <div class="form-username field">
							                        <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
							                        <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
							                    </div>
							                    <div class="form-username field">
							                        <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
							                        <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
							                    </div>
							                    <div class="form-email field">
							                        <label for="email"><?php _e('E-mail', 'profile'); ?></label>
							                        <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
							                    </div>
							                    <div class="form-birthday field">
							                        <label for="birthday"><?php _e('Birthday', 'profile'); ?></label>
							                        <input class="text-input" name="birthday" type="text" id="birthday" value="<?php echo get_user_meta($current_user->ID, 'birthday', true); ?>" />
							                    </div>							                    
<!-- 							                    <div class="form-url field">
							                        <label for="url"><?php _e('Website', 'profile'); ?></label>
							                        <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
							                    </div> -->
<!-- 							                    <div class="form-password field">
							                        <label for="pass1"><?php _e('Password', 'profile'); ?> </label>
							                        <input class="text-input" name="pass1" type="password" id="pass1" />
							                    </div>
							                    <div class="form-password field">
							                        <label for="pass2"><?php _e('Repeat Password', 'profile'); ?></label>
							                        <input class="text-input" name="pass2" type="password" id="pass2" />
							                    </div> -->
<!-- 							                    <div class="form-textarea field">
							                        <label for="description"><?php _e('Biographical Information', 'profile') ?></label>
							                        <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
							                    </div> -->
											</div>
						                    <div class="address-info profile-section">
						                    	<h3>Address Info</h3>
							                    <div class="address field">
							                        <label for="address"><?php _e('Address', 'profile'); ?></label>
							                        <input class="text-input" name="address" type="text" id="address" value="<?php the_author_meta( 'address', $current_user->ID ); ?>"/>
							                    </div>		
							                    <div class="city field">
							                        <label for="city"><?php _e('City', 'profile'); ?></label>
							                        <input class="text-input" name="city" type="text" id="city" value="<?php the_author_meta( 'city', $current_user->ID ); ?>"/>
							                    </div>	
							                    <div class="country field">
							                        <label for="country"><?php _e('Country', 'profile'); ?></label>
							                        <input class="text-input" name="country" type="text" id="country" value="<?php the_author_meta( 'country', $current_user->ID ); ?>"/>
							                    </div>								                    	
							                    <div class="zip field">
							                        <label for="zip"><?php _e('Zip', 'profile'); ?></label>
							                        <input class="text-input" name="zip" type="text" id="zip" value="<?php the_author_meta( 'zip', $current_user->ID ); ?>"/>
							                    </div>	
							                    <div class="state field">
							                        <label for="state"><?php _e('State', 'profile'); ?></label>
							                        <select name="state" id="state">
							                        	<?php 
							                        		$selected = get_the_author_meta('state', $current_user->ID);

							                        		$states = get_state_abbrevs();
							                        		populate_dropdown($states, $selected); 
							                        	?>
							                        </select>
							                    </div>	
						                    </div>
											<div class="membership-info profile-section">
												<h3><?php _e("Membership Info", "pmpro"); ?></h3>

												<?php //var_dump(get_user_meta($current_user->ID)); ?>
												<p><?php echo $level = $current_user->membership_level->name; ?></p>
												<?php $slug = strtolower(str_replace(" ", "_", $level)); ?>
												<img src="<?php bloginfo('template_directory'); ?>/library/images/membership_levels/<?php echo $slug; ?>.jpg" alt="">
												<div class="membership-info">
													<?php echo $current_user->membership_level->description; ?>
												</div>
											</div>
						                    <div class="form-submit field">
						                        <?php echo $referer; ?>
						                        <input name="updateuser" type="submit" id="updateuser" class="submit button cta" value="<?php _e('Update', 'profile'); ?>" />
						                        <?php wp_nonce_field( 'update-user' ) ?>
						                        <input name="action" type="hidden" id="action" value="update-user" />
						                    </div><!-- .form-submit -->
						                </form><!-- #adduser -->
						            <?php endif; ?>
						        </div><!-- .entry-content -->
						    </div><!-- .hentry .post -->
						    <?php endwhile; ?>
						<?php else: ?>
						    <p class="no-data">
						        <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
						    </p><!-- .no-data -->
						<?php endif; ?>							

						</div>

				</div>
			<?php var_dump($woocommerce->customer); ?>
			</div>

<?php get_footer(); ?>
