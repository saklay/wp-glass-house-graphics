<?php 
/*
 * 
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
    <link href="<?php bloginfo('template_url'); ?>/scripts/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	<?php 
	
 		wp_enqueue_script("jquery");
		
		// global theme variables 
		// this will get page id of pages
		
		$talents = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'talents'");
		$services = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'services'");
		$contact = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'contact'");
		$portfolio = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'portfolio'");
		$store = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'store'");
		
		
		$breakinginto = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'breaking-into-the-industry'");
		$tipstech = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'tips-techniques'");
		$hirestryout = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'hi-resolution-tryout-downloads'");
		
		// remove?
		$advertising = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'advertisingservices'");
		$animanga = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'animanga'");
		$bookmagazine = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'book-magazine-and-trading-card-illustrations'");
		$comicsgraphic = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'comics-graphic-novels-comic-strips'");
		$conceptualdev = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'conceptual-development-and-licensing'");
		$customcomics = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'complete-custom-comics-and-childrens-book-services'");
		$logosandcorporate = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'logos-and-corporate-identity'");
		$medicalillust = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'medical-illustrations'");
		$modelsculptures = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'model-sculptures-movie-monsters'");
		$specialtyprinting = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'specialty-printing'");
		$storyboards = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'storyboards-and-game-concepts'");
		$webdesign = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'web-design-and-maintennance'");
		$writing = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'writing'");
		
		
		$clients = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'clients-lists'");
		$getaquote = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'get-a-quote'");
		$seminar = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'seminars-and-conventions'");
		
		$podcastlink = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'podcast-archive'");
		
		/*
		// exclude pages in portfolio
		$excludepagesinportfolio = array(
			$contact,
			$services,
			$talents,
			$portfolio
			);
		*/

		
		// used by talents page (accordion) 
		if ( is_page(41) ) { ?>
			<script>
				$(document).ready(function() {
					$("#accordion").accordion({ 
					    'active': false,
					    'fillSpace': true,
					    'clearStyle': true
					});
				});
			</script>
	<?php };
	

	// random background
	include (TEMPLATEPATH . '/includes/inc_randomimg.php'); ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/supersized.3.0.core.js"></script>
		<script type="text/javascript">  
			$(function(){
				$.fn.supersized.options = {  
					startwidth: 1024,
					startheight: 768,
					vertical_center: 1,
					slides : [
						{image : '<?php bloginfo('template_directory'); ?>/bg/<?php echo $image_name; ?>' }
						]
				};
				$('#supersized').supersized(); 
			});
	</script>
	
	<?php wp_head(); ?>
	
</head>

<body>
<div id="supersized"></div>
<div id="scroller">
<div id="wrapall">
<div id="header">
	<div class="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo-head.png" alt="Glass House Graphics" /></a></div>
	<div class="headmenu">
		<div class="newsletter">
			<span class="search">Page Search</span>
			<?php get_search_form(); 
			
			/*
			<span>Subscribe to the Glass House Graphics Inc. Newsletter:</span>
			<label>Email:</label><input type="text" /><input type="submit" value="Subscribe" /> <a href="#">Visit this group</a>
			*/ 
			?>
		</div>
		<div class="menu clearboth">
			<ul>
				<li><a href="<?php bloginfo('template_url'); ?>/downloads/GHG_catalogue.pdf" title="Catalogue">Catalogue</a></li>
				<li><a href="http://www.facebook.com/pages/Glass-House-Graphics/137478469670823" target="_blank">Facebook</a></li>
				<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $clients ?>">Clients</a></li>
				<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $getaquote ?>">Get a Quote</a></li>
				<li><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $seminar ?>">Seminar</a></li>
			</ul>
		</div>
	</div>
	<div class="clearboth"></div>
</div>

<?php if ( is_home() ) { 
	// Podcast and Featured Content Slider
	?>
	<div id="headgallery">
		<div class="left">
			<div class="podcast">
				<strong>Listen to the latest</strong><br />
				<span>PODCAST!</span>
				<?php // POST PODCAST
				$args = array( 'post_type' => 'ghg_podcast', 'posts_per_page' => 1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					echo '<div class="podcast-content">'; ?>
					<span><?php the_title(); ?></span>
					<?php 
					
					$downloadlink = get_post_meta($post->ID, 'downloadlink', true); 
					
					the_content();
					echo "<p />";
					
					echo "<p /><a href='".home_url( '/' )."?page_id=".$podcastlink."'>Podcast archive</a>";
					echo '</div>';
				endwhile;
				?>
			</div>
		</div>
		<div class="right">
			<?php if ( function_exists( 'meteor_slideshow' ) ) { 
					meteor_slideshow(); 
				} else {?>
					<img src="<?php bloginfo('template_url'); ?>/images/temp-gallery-img.jpg" alt="sample" />
			<?php } ?>
		</div>
		<div class="clearboth"></div>
	</div>
<?php
	// End Podcast and Featured Content Slider
	} 

	// includes main navigation
	include (TEMPLATEPATH . '/includes/inc_mainnavigation.php');
			
	?>