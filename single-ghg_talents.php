<?php 
/*
 *
 */ 
get_header(); ?>	

<div id="wrapper">
	<div class="articlebody">
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		
		// Talent's variables
		
		// grabs post meta
		$handler = get_post_meta($post->ID, 'talent_handler', true); 
		$talentfb = get_post_meta($post->ID, 'talent_fb', true); 
		$talenttwitter = get_post_meta($post->ID, 'talent_twitter', true); 
		$talentinterview = get_post_meta($post->ID, 'talent_interview', true); 
		
		// grabs talent info
		$userslug = $_GET["ghg_talents"];
		$userinfo = get_userdatabylogin($userslug);
		
		
	?>
		<div class="post" id="post_<?php the_ID(); ?>">
			<div class="entry">
				<img src="<?php bloginfo('template_url'); ?>/images/page-head-talents.png" alt="Talents" />
				<?php 
					// inserts talent sub menu in all talents page
					include (TEMPLATEPATH . '/includes/inc_talent_sub_menu.php'); 
					// end insert
					?>
				<div class="talent_handler clearboth">
					To inquire about talent availability and rates, please contact <a href="mailto:<?php echo $handler; ?>"><?php echo $handler; ?></a>.
				</div>
				<div class="talent_details">
					<div class="talent_avatar">
						<?php if ( has_post_thumbnail() ) { 
								the_post_thumbnail('single-post-thumbnail');
							} else { ?>
								<img src="<?php bloginfo('template_url'); ?>/images/ghg-logo-200x200.jpg" alt="Glass House Graphics" />
							<?php } ?>
					</div>
					<div class="talent_basicinfo">
						<h3>
							<?php 
								echo $userinfo->user_firstname; 
								echo "&nbsp;"; 
								echo $userinfo->user_lastname; 
								?>
						</h3>
						<?php 
							echo '<strong>Position: </strong>' . $userinfo->ghg_position . "\n";
							echo '<p />';
							echo '<strong>Birthday: </strong>' . $userinfo->ghg_birthday . "\n";
							echo '<p />';
							echo '<strong>Civil Status: </strong>' . $userinfo->ghg_civilstat . "\n";
							echo '<p />';
							echo '<strong>Favorite Artist: </strong>' . $userinfo->ghg_favartist . "\n";
							echo '<p />';
							echo '<strong>Blog: </strong><a href="' . $userinfo->ghg_blogurl . '">' . $userinfo->ghg_blogurl . '</a>';
							echo '<p />';
							// if has facebook page
							if ( !empty($talentfb) ) {
								echo 'Follow me on <a href="'.$talentfb.'" title="follow me!" target="_blank">Facebook</a>';
								echo '<p />';
							}
							// if has twitter account
							if ( !empty($talenttwitter) ) {
								echo 'Follow me on <a href="'.$talenttwitter.'" title="follow me!" target="_blank">Twitter</a>';
								echo '<p />';
							}
							// if has bio/interview page
							if ( !empty($talentinterview) ) {
								echo '<strong><a href="'.$talentinterview.'">Click here to check out my BIOGRAPHY and INTERVIEW!</a></strong>';
							}
						?>
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="talent_bio">
					<h2>Works</h2>
					<div class="talent_gallery">
					    <a name="talentgalleryimages"></a>
						<?php 
							// display nextgen gallery    
							$galleryid = get_post_meta($post->ID, 'ngg_galleryid', true); 
							$galleryname_01 = get_post_meta($post->ID, 'ngg_galleryname01', true); 
							
							if ( !empty($galleryid) ) {
									echo '<h2 style="background: url(';
									echo bloginfo('template_url');
									echo '/images/bg-gallery-h2.png) no-repeat">'.$galleryname_01.'</h2>';
									echo nggShowGallery($galleryid); // echo nggShowGallery($galleryid,'galleryview',0); // gallery_id + carousel_on + number-of-imgs
								} else { 
									echo "No uploaded image.";
								};

							$galleryid_02 = get_post_meta($post->ID, 'ngg_galleryid02', true); 
							$galleryname_02 = get_post_meta($post->ID, 'ngg_galleryname02', true); 								
							if ( !empty($galleryid_02) ) {
									echo '<h2 style="background: url(';
									echo bloginfo('template_url');
									echo '/images/bg-gallery-h2.png) no-repeat">'.$galleryname_02.'</h2>';
									echo nggShowGallery($galleryid_02); // gallery_id + carousel_on + number-of-imgs
								};
								
							$galleryid_03 = get_post_meta($post->ID, 'ngg_galleryid03', true); 
							$galleryname_03 = get_post_meta($post->ID, 'ngg_galleryname03', true); 								
							if ( !empty($galleryid_03) ) {
									echo '<h2 style="background: url(';
									echo bloginfo('template_url');
									echo '/images/bg-gallery-h2.png) no-repeat">'.$galleryname_03.'</h2>';
									echo nggShowGallery($galleryid_03); // gallery_id + carousel_on + number-of-imgs
								};
								
							$galleryid_04 = get_post_meta($post->ID, 'ngg_galleryid04', true); 
							$galleryname_04 = get_post_meta($post->ID, 'ngg_galleryname04', true); 								
							if ( !empty($galleryid_04) ) {
									echo '<h2 style="background: url(';
									echo bloginfo('template_url');
									echo '/images/bg-gallery-h2.png) no-repeat">'.$galleryname_04.'</h2>';
									echo nggShowGallery($galleryid_04); // gallery_id + carousel_on + number-of-imgs
								};
								
							$galleryid_05 = get_post_meta($post->ID, 'ngg_galleryid05', true); 
							$galleryname_05 = get_post_meta($post->ID, 'ngg_galleryname05', true); 								
							if ( !empty($galleryid_05) ) {
									echo '<h2 style="background: url(';
									echo bloginfo('template_url');
									echo '/images/bg-gallery-h2.png) no-repeat">'.$galleryname_05.'</h2>';
									echo nggShowGallery($galleryid_05); // gallery_id + carousel_on + number-of-imgs
								};
						?>
					</div>
					<div class="talent_detailedbio">
						<?php the_content(); ?>
					</div>
					<div class="clearboth"></div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
		<div class="post">
			<div class="entry">
				<h3>Post not found</h3>
			</div>
		</div>
	<?php endif; ?>
	</div>
	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
	<div class="clearboth"></div>
</div>
<?php get_footer(); ?>