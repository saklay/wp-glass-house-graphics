<?php /* * */ get_header(); ?>	<div id="wrapper">	<div class="articlebody">		<h1>NewsBlog</h1>		<hr />	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		<div class="post clearboth" id="post_<?php the_ID(); ?>">			<div class="entry">				<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>				<small>This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>.</small>				<div class="newexcerpt">					<?php the_excerpt(); ?>				</div>			</div>		</div>	<?php 			endwhile; 		echo '<p />';		posts_nav_link(' &#183; ', 'Newer Articles', 'Older articles'); 			?>	<?php else : ?>		<div class="post">			<div class="entry">				<h3>Post not found</h3>			</div>		</div>	<?php endif; 	?>	</div>	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>	<div class="clearboth"></div></div><?php get_footer(); ?>