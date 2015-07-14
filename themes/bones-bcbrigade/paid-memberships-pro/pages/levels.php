<?php 
global $wpdb, $pmpro_msg, $pmpro_msgt, $pmpro_levels, $current_user;
if($pmpro_msg)
{
?>
<div class="pmpro_message <?php echo $pmpro_msgt?>"><?php echo $pmpro_msg?></div>
<?php
}
?>
<!-- Just text that is localized -->
<!-- <h2><?php _e('Level', 'pmpro');?></h2> -->
<!-- <h2><?php _e('Price', 'pmpro');?></h2> -->

<?php	
$count = 0;
foreach($pmpro_levels as $level)
{
  if(isset($current_user->membership_level->ID))
	  $current_level = ($current_user->membership_level->ID == $level->id);
  else
	  $current_level = false;
?>

<?php $slug = strtolower(str_replace(" ", "_", $level->name)); ?>

<div class="membership_level m-all t-1of3 d-1of3 <?php echo pmpro_level_slug($current_user); ?><?php if($current_level == $level) { ?> active<?php } ?>">
	<!-- <div><?php echo $current_level ? "<strong>{$level->name}</strong>" : $level->name?></div> -->
<!-- 	<div class="cost">
		<?php 
			if(pmpro_isLevelFree($level))
				$cost_text = "<strong>Free</strong>";
			else
				$cost_text = pmpro_getLevelCost($level, true, true); 
				$expiration_text = pmpro_getLevelExpiration($level);
			if(!empty($cost_text) && !empty($expiration_text))
				echo $cost_text . "<br />" . $expiration_text;
			elseif(!empty($cost_text))
				echo $cost_text;
			elseif(!empty($expiration_text))
				echo $expiration_text;
		?>
	</div> -->
	<?php if(empty($current_user->membership_level->ID)) { ?>
		<a class="level-image" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>">
			<img src="<?php bloginfo('template_directory'); ?>/library/images/membership_levels/<?php echo $slug; ?>.jpg" alt="">
		</a>
		<?php if(wp_is_mobile()){ ?>
			<a class="details button" href="#">Show Details</a>
		<?php } ?>
		<aside>
			<?php echo $level->description; ?>
			<a class="level-btn button cta m-all" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>">SIGNUP</a>
		</aside>
		
	<?php } elseif ( !$current_level ) { ?>                	
		<a class="level-image" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>">
			<img src="<?php bloginfo('template_directory'); ?>/library/images/membership_levels/<?php echo $slug; ?>.jpg" alt="">
		</a>
		<?php if(wp_is_mobile()){ ?>
			<a class="details button" href="#">Show Details</a>
		<?php } ?>
		<aside>
			<?php echo $level->description; ?>
			<a class="level-btn button cta m-all" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>">SIGNUP</a>
		</aside>
		
	<?php } elseif($current_level) { ?>      
		
		<?php
			//if it's a one-time-payment level, offer a link to renew				
			if(!pmpro_isLevelRecurring($current_user->membership_level) && !empty($current_user->membership_level->enddate))
			{
			?>
				<a class="level-image" class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Renew', 'pmpro');?></a>
			<?php
			}
			else
			{
			?>
				<a class="level-image" class="current_level" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>">
					<img src="<?php bloginfo('template_directory'); ?>/library/images/membership_levels/<?php echo $slug; ?>.jpg" alt="">
				</a>
				<?php if(wp_is_mobile()){ ?>
			<a class="button details" href="#">Show Details</a>
				<?php } ?>
				<aside>
					<?php echo $level->description; ?>
					<a class="current_level level-btn button cta m-all" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>">SIGNUP</a>
				</aside>
				
			<?php
			}
		?>
		
	<?php } ?>
</div>
<?php
}
?>
