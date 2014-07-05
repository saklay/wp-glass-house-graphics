<?php /* * */ get_header();         $breakinginto = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'breaking-into-the-industry'");		$tipstech = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'tips-techniques'");		$hirestryout = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'hi-resolution-tryout-downloads'");				$advertising = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'advertisingservices'");		$animation = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'animation-services'");		$animanga = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'animanga'");		$bookmagazine = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'book-magazine-and-trading-card-illustrations'");		$comicsgraphic = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'comics-graphic-novels-comic-strips'");		$conceptualdev = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'conceptual-development-and-licensing'");		$customcomics = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'custom-comics'");		$customcom = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'custom-comissions'");		$logosandcorporate = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'logos-and-corporate-identity'");		$medicalillust = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'medical-illustrations'");		$modelsculptures = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'model-sculptures-movie-monsters'");		$photoretouch = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'photo-retouching-and-enhancement'");		$specialtyprinting = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'specialty-printing'");		$storyboards = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'storyboards-and-game-concepts'");		$webdesign = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'web-design-and-maintennance'");		$writing = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'writing'");		// child of services		$childof_services = array(			'services',			'advertisingservices',			'animanga',			'animation-services',			'cutting-edge-productions',			'book-magazine-and-trading-card-illustrations',			'comics-graphic-novels-comic-strips',			'custom-comissions',			'conceptual-development-and-licensing',			'custom-comics',			'logos-and-corporate-identity',			'medical-illustrations',			'model-sculptures-movie-monsters',			'photo-retouching-and-enhancement',			'specialty-printing',			'storyboards-and-game-concepts',			'web-design-and-maintennance',			'writing'			);					// child of portfolio		$childof_portfolio = array(			'portfolio',			'breaking-into-the-industry',			'tips-techniques',			'hi-resolution-tryout-downloads',			'x-men-test-plot-script',			'for-scandals-1-good-as-gold',			'batman-script-sample-by-michael-buckley',			'sample-plot-harley-quinn',			'superman-sample-plot-sequence',			'bad-dc-girls-sample-plot-sequence',			'red-sonja-enslaved-by-the-sorcerer',			'fantastic-four-new-sample-plot-sequence'			);?><div id="wrapper">	<div class="articlebody">	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		<div class="post" id="post_<?php the_ID(); ?>">			<div class="entry">				<?php 				if ( is_page('contact') ) {						echo '<img src="';						bloginfo('template_url');						echo '/images/page-head-contact.png"';						echo ' alt="Make Contact" />';					} elseif ( is_page('talents') ) {						echo '<img src="';						bloginfo('template_url');						echo '/images/page-head-talents.png"';						echo ' alt="Talents" />';					} elseif ( is_page( $childof_portfolio ) ) {						echo '<img src="';						bloginfo('template_url');						echo '/images/page-head-portfolio.png"';						echo ' alt="Portfolio" />'; 												?>						<div class="talent_subhead">							<div>								<ul class="top">									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $breakinginto ?>">Breaking Into the Industry</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $tipstech ?>">Tips & Techniques</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $hirestryout ?>">Hi-res tryout Downloads</a></li>								</ul>							</div>							<br class="clearboth" /> 						</div>					<?php }										elseif ( is_page( $childof_services ) ) {  // $childof_services						echo '<img src="';						bloginfo('template_url');						echo '/images/page-head-services.png"';						echo ' alt="Services" />'; 												?>						<div class="talent_subhead">							<div>														<ul class="top">									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $advertising ?>">Advertising</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $animation ?>">Animation</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $animanga ?>">Animanga</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $bookmagazine ?>">Book Illustrations</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $comicsgraphic ?>">Comics</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $customcomics ?>">Custom Comics</a></li>								</ul>							</div>							<div class="clearboth">								<ul class="bottom">									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $conceptualdev ?>">Conceptual Development</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $logosandcorporate ?>">Logos</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $medicalillust ?>">Medical Illustrations</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $modelsculptures ?>">Model Sculptures</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $photoretouch ?>">Photo Retouching</a></li>								</ul>							</div>							<div class="clearboth">								<ul class="top">									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $specialtyprinting ?>">Specialty Printing</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $storyboards ?>">Storyboard Game Concepts</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $webdesign ?>">Web Design</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $writing ?>">Writing</a></li>									<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $customcom ?>">Custom Commissions</a></li>								</ul>							</div>						</div>									<?php }								the_content(); 				wp_link_pages();								?>			</div>		</div>	<?php endwhile; ?>	<?php else : ?>		<div class="post">			<div class="entry">				<h3>Post not found</h3>			</div>		</div>	<?php endif; ?>	</div>	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>	<div class="clearboth"></div></div><?php get_footer(); ?>