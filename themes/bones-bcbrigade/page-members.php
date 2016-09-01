<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */

/* Get user info. */
global $current_user, $wp_roles, $pmpro_levels;
get_currentuserinfo();
$blogusers = get_users( 'role=subscriber' );
?>

<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">
		<style>
			.user {
				padding: 10px;
				margin-bottom: 15px;
			}

			.user p {
				margin: 0;
			}
		</style>
			<?php $count = 0; ?>
			<?php foreach ($blogusers as $user) {

				$count++;
				$id = $user->ID;
				$all = get_user_meta($id);
				$user_info = get_userdata($id);
				$first = get_user_meta( $id, 'first_name', true );
				$last = get_user_meta( $id, 'last_name', true );
				$address = get_user_meta( $id, 'address', true );
				$city = get_user_meta( $id, 'city', true );
				$zip = get_user_meta( $id, 'zip', true );
				$state = get_user_meta( $id, 'state', true );
				$email = get_user_meta( $id, 'pmpro_bemail', true );
			?>
				<div class="user">
					<p>Name: <?php echo $first; ?> <?php echo $last; ?></p>
					<p>Email: <?php echo $user_info->user_email; ?></p>
					<p>Address: <?php echo $address; ?> <?php echo $city; ?> <?php echo $zip; ?> <?php echo $state; ?></p>
				</div>

			<?php } ?>
			<div class="count"><?php echo $count; ?></div>
		</div>

	</div>

<?php get_footer(); ?>
