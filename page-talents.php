<?php 
/*
 *
 */ 
get_header(); ?>	

<div id="wrapper">
	<div class="articlebody">

		<div class="post" id="post_<?php the_ID(); ?>">
			<div class="entry">
				<img src="<?php bloginfo('template_url'); ?>/images/page-head-talents.png" alt="Talents" />	
				<div class="talent_handler clearboth">
					Click on each category title to see a list of Talents for each category.
				</div>

				<?php 

					// list taxonomy TALENTS and display contents under it.
					$post_type = 'ghg_talents';
					$tax = 'talent';
					$tax_terms = get_terms($tax,'hide_empty=0');

					//list the taxonomy
					$i=0; // counter for printing separator bars
					foreach ($tax_terms as $tax_term) {
						$wpq = array ('taxonomy'=>$tax,'term'=>$tax_term->slug);
						$query = new WP_Query ($wpq);
						$article_count = $query->post_count;
						
						/*
						// makes a tax menu
						echo "<a href=\"#".$tax_term->slug."\">".$tax_term->name."</a>";
						// output separator bar if not last item in list
						if ( $i < count($tax_terms)-1 ) {
							echo " | " ;
						}
						*/
					$i++;
					}
				    
					//list everything
					echo "<div id=\"accordion\">";
					if ($tax_terms) {
						foreach ($tax_terms as $tax_term) {
							$args=array(
							'post_type' => $post_type,
							"$tax" => $tax_term->slug,
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'caller_get_posts'=> 1,
							'orderby' => 'title',
							'order' => 'ASC'
							);

							$my_query = null;
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
								echo "<h3 class=\"tax_term-heading\" id=\"h3_".$tax_term->slug."\"><a href=\"#\">$tax_term->name</a></h3>"; // this is the taxonomy slug
								echo "<div class=\"talent_list\" id=\"".$tax_term->slug."\">";
								echo "<span>To inquire about talent availability and rates, please contact <a href=\"mailto:david@glasshousegraphics.com\" alt=\"david@glasshousegraphics.com\">david@glasshousegraphics.com</a>.</span>";
								echo "<ul>";
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<li>
										<?php if ( get_post_meta($post->ID, 'talent_thumb', true) ) { ?>
											<a href="<?php the_permalink() ?>" rel="bookmark">
												<img class="thumb" src="<?php echo get_post_meta($post->ID, 'talent_thumb', true) ?>" alt="<?php the_title(); ?>" />
											</a>
										<?php } else { ?>
											<a href="<?php the_permalink() ?>" rel="bookmark">
												<img class="thumb" src="<?php bloginfo('template_url'); ?>/images/talent-feat-thumb.png" alt="<?php the_title(); ?>" />
											</a>
										<?php } ?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
									
									<?php
									endwhile;
								echo "</ul>";
								echo "<br class=\"clearboth\" />";
								echo "</div>";
								}
							wp_reset_query();
						}
					}
					echo "</div>";
					?>
			</div>
		</div>
	</div>
	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
	<div class="clearboth"></div>
</div>

<script type="text/javascript">
    $(".idTabs .menu ul").idTabs("ctalents");
</script>

<?php if (substr_count($_SERVER["REQUEST_URI"],"&cat=") > 0) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#accordion').accordion('activate', -1);
        $("#accordion").accordion('activate', <?php echo substr($_SERVER["REQUEST_URI"],strpos($_SERVER["REQUEST_URI"],"&cat=")+5); ?>);
    });
</script>
<?php } ?>

<?php get_footer(); ?>