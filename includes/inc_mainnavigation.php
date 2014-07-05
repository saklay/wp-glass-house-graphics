<?php 
/*
 * Template Name: Main Navigation  
 * 
 */
?>

<div class="idTabs">
	<div class="menu">
		<ul id="tabmenu" class="main_navigation_tabs">
			<li class="mtalents">
				<a class="" id="tab1" href="<?php echo home_url( '/' ); ?>/?page_id=<?php echo $talents ?>" tabid="#ctalents" ><img src="<?php bloginfo('template_url'); ?>/images/menu-talent.png" /></a>
			</li>
			<li class="mservices">
				<a class="" id="tab2" tabid="#cservices"><img src="<?php bloginfo('template_url'); ?>/images/menu-services.png" alt="Services" /></a>
			</li>
			<li class="mportfolio">
				<a href="<?php echo home_url( '/' ); ?>/?page_id=<?php echo $portfolio ?>"><img src="<?php bloginfo('template_url'); ?>/images/menu-portfolio.png" alt="Portfolio" /></a>
			</li>
			<li class="mstore">
				<a class="" id="tab3" tabid="#cstore"><img src="<?php bloginfo('template_url'); ?>/images/menu-store.png" alt="Store" /></a>
			</li>
			<li class="mcontact">
				<a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $contact ?>" alt="Make Contact"><img src="<?php bloginfo('template_url'); ?>/images/menu-contact.png" alt="Contact" /></a>
			</li>
		</ul>
	</div>
	<div class="clearboth"></div>
</div>
<?php if ( is_home() ) { ?>
<div id="default_tab" class="default">
		This is a look into the windows of Glass House Graphics, a professional service firm with a passion for visuals so strong you can sense it, see it, feel it, taste it.
		Pulitzer Prize-nominated, Clio Award-winning talent that transforms "assignments" and "projects" into designs, graphics, and artwork that take your breath away.
		Match this with nearly two decades of experience lavishing creative services onto the advertising, film, publishing, and web communities, and you get the kind of
		compelling creativity only Glass House Graphics can provide.
</div> 
<?php } ?>
<div class="items">
	<div id="ctalents">
		<?php include (TEMPLATEPATH . '/includes/inc_menu_talents.php'); ?>
	</div>
	<div id="cservices">
		<?php
			// call child of SERVICES
			$advertising = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'advertisingservices'");
			$animation = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'animation-services'");
			$animanga = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'animanga'");
			$bookmagazine = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'book-magazine-and-trading-card-illustrations'");
			$comicsgraphic = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'comics-graphic-novels-comic-strips'");
			$conceptualdev = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'conceptual-development-and-licensing'");
			$customcomics = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'custom-comics'");
			$customcom = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'custom-comissions'");
			$logosandcorporate = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'logos-and-corporate-identity'");
			$medicalillust = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'medical-illustrations'");
			$modelsculptures = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'model-sculptures-movie-monsters'");
			$photoretouch = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'photo-retouching-and-enhancement'");
			$specialtyprinting = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'specialty-printing'");
			$storyboards = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'storyboards-and-game-concepts'");
			$webdesign = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'web-design-and-maintennance'");
			$writing = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'writing'");
			
		?>
		<ul class="menu_services">
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $advertising ?>">Advertising</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $animation ?>">Animation</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $animanga ?>">Animanga</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $bookmagazine ?>">Book Illustrations</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $comicsgraphic ?>">Comics</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $customcomics ?>">Custom Comics</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $conceptualdev ?>">Conceptual Development</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $logosandcorporate ?>">Logos</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $medicalillust ?>">Medical Illustrations</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $modelsculptures ?>">Model Sculptures</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $photoretouch ?>">Photo Retouching</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $specialtyprinting ?>">Specialty Printing</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $storyboards ?>">Storyboard Game Concepts</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $webdesign ?>">Web Design</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $writing ?>">Writing</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $customcom ?>">Custom Commissions</a></li>
		</ul>
		<br class="clearboth" />
	</div>
<?php /*
	<div id="cportfolio">
		<strong><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $portfolio ?>">Portfolio</a></strong>. This is a look into the windows of Glass House Graphics, a professional service firm with a passion for visuals so strong you can sense it, see it, feel it, taste it.
		Pulitzer Prize-nominated, Clio Award-winning talent that transforms "assignments" and "projects" into designs, graphics, and artwork that take your breath away.
		Match this with nearly two decades of experience lavishing creative services onto the advertising, film, publishing, and web communities, and you get the kind of
		compelling creativity only Glass House Graphics can provide.
	</div>
*/ ?>
	<div id="cstore">
		<img src="<?php bloginfo('template_url'); ?>/images/store-artcomics.png" alt="Art and Comics" align="left" />
		<p>
<!--
			For Comics and Collectibles, click here: <br />
			<a href="http://www.artandcomics.com" target="_blank">www.artandcomics.com</a>
-->
			For Original Artwork, click here: <br />
			<a href="http://www.artandcomicsstore.com" target="_blank">www.artandcomicsstore.com</a>
		</p>
	</div>
</div>
	
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.idTabs.js"></script>
