<?php /* * */ get_header(); ?>	<div id="wrapper">	<div class="articlebody">	<?php if (have_posts()) : while (have_posts()) : the_post(); 				// Talent's variables				// grabs post meta		$handler = get_post_meta($post->ID, 'talent_handler', true); 		$galleryid = get_post_meta($post->ID, 'ngg_galleryid', true); 		$talentfb = get_post_meta($post->ID, 'talent_fb', true); 		$talenttwitter = get_post_meta($post->ID, 'talent_twitter', true); 		$talentinterview = get_post_meta($post->ID, 'talent_interview', true); 				// grabs talent info		$userslug = get_post_meta($post->ID, 'interviewee', true); 		$userinfo = get_userdatabylogin($userslug);				$userpagelink = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$userslug'");			?>		<div class="post" id="post_<?php the_ID(); ?>">			<div class="entry">				<img src="<?php bloginfo('template_url'); ?>/images/page-head-talents.png" alt="Talents" />				<?php 					// inserts talent sub menu in all talents page					include (TEMPLATEPATH . '/includes/inc_talent_sub_menu.php'); 					// end insert					?>				<div class="talent_handler clearboth">					To inquire about talent availability and rates, please contact <a href="mailto:<?php echo $handler; ?>"><?php echo $handler; ?></a>.				</div>				<div class="talent_details">					<div class="talent_avatar">						<?php if ( has_post_thumbnail() ) { 								the_post_thumbnail('single-post-thumbnail');							} else { ?>								<img src="<?php bloginfo('template_url'); ?>/images/ghg-logo-200x200.jpg" alt="Glass House Graphics" />							<?php } ?>					</div>					<div class="talent_basicinfo">						<h3>							<?php 								echo $userinfo->user_firstname; 								echo "&nbsp;"; 								echo $userinfo->user_lastname; 								?>						</h3>						<?php 							echo '<strong>Position: </strong>' . $userinfo->ghg_position . "\n";							echo '<p />';							echo '<strong>Birthday: </strong>' . $userinfo->ghg_birthday . "\n";							echo '<p />';							echo '<strong>Civil Status: </strong>' . $userinfo->ghg_civilstat . "\n";							echo '<p />';							echo '<strong>Favorite Artist: </strong>' . $userinfo->ghg_favartist . "\n";							echo '<p />';							echo '<strong>Blog: </strong><a href="' . $userinfo->ghg_blogurl . '">' . $userinfo->ghg_blogurl . '</a>';							echo '<p />';							// if has facebook account							if ( !empty($talentfb) ) {								echo 'Follow me on <a href="'.$talentfb.'" title="follow me!" target="_blank">Facebook</a>';								echo '<p />';							}							// if has twitter account							if ( !empty($talenttwitter) ) {								echo 'Follow me on <a href="'.$talenttwitter.'" title="follow me!" target="_blank">Twitter</a>';								echo '<p />';							}							// if has bio/interview page							if ( !empty($talentinterview) ) {								echo '<a href="'.$talentinterview.'">Click here to check out my BIOGRAPHY and INTERVIEW!</a>';								echo '<p />';							} ?>							<h6><a href="<?php echo home_url( '/' ); ?>?ghg_talents=<?php echo $userslug ?>">Click here to check out my PERSONAL GALLERY!</a></h6>					</div>					<div class="clearboth"></div>				</div>				<div class="talent_bio">					<?php the_content(); ?>					<div class="clearboth"></div>				</div>			</div>		</div>	<?php endwhile; ?>	<?php else : ?>		<div class="post">			<div class="entry">				<h3>Post not found</h3>			</div>		</div>	<?php endif; ?>	</div>	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>	<div class="clearboth"></div></div><?php get_footer(); ?>