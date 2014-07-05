<?php 
/*
 *
 */ 
get_header(); ?>	

<div id="homewrapper">
	<div class="leftsidebar">
		<div class="title">
			<span>Featured</span>
			<strong>Artists</strong>
		</div>
		<?php 
			// FEATURED ARTISTS
			echo "<ul>";
			dynamic_sidebar( 'featuredartists' ); // just place html image link in a text box widgets.
			echo "</ul>";
		?>
	</div>
	<div class="articlebody">
				<h1>NewsBlog</h1>
				<hr />
				<?php 
					// use this if you wish to display posts from a certain category only
					//$recent = new WP_Query("cat=1&showposts=5"); while($recent->have_posts()) : $recent->the_post();
					if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post">
					<div class="postthumb">
						<?php 
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								echo '<a href="<?php the_permalink() ?>" rel="bookmark">';
								the_post_thumbnail('blogpost');
								echo '</a>';
							} else { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark">
									<img src="<?php bloginfo('template_url'); ?>/images/thumb-ghg.jpg" alt="" />
								</a>
						<?php } ?>
					</div>
					<div class="entry"> 
						<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<div><small>Posted on: <?php the_time('F j, Y') ?></small></div>
						<div class="newexcerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
					<div class="clearboth"></div>
				</div>
				<?php endwhile; 
					posts_nav_link(' &#183; ', 'Newer Articles', 'Older articles'); 
					echo '<br /><a href="'.home_url().'/?category_name=news" title="Newsblog Archives">Newsblog Archives</a>';
				
					// remove if will use post by category
					endif; ?>
	</div>
	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
	<div class="clearboth"></div>
</div>
<?php get_footer(); ?>