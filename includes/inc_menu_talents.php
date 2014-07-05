<?php 
 /*
 * 
 *
 *
 */ ?>
 
    <script type="text/javascript">
        function talentRedirect(selectID) {
            var talentURL;
            talentURL = document.getElementById(selectID).value;
            if (talentURL) { document.location.href = talentURL; }
        }
    </script>

	<div class="left">
			<span>
				Choose from the quicklists to find a specific talent, or click <a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $talents ?>">HERE</a> for a detailed search.
			</span>
		</div>
		<div class="left" id="talentselect">

				<?php 

					// list taxonomy TALENTS and display contents under it.
					// http://wordpress.org/support/topic/list-posts-by-taxonomy-tag
					$post_type = 'ghg_talents';
					$tax = 'talent';
					$tax_terms = get_terms($tax,'hide_empty=0');
					
					//list everything
					if ($tax_terms) {
					    // $talentcount = 0;
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
							    
								echo "<select id='talent_".$talentcount."' onChange='talentRedirect(\"talent_".$talentcount."\");'>";
								echo "<option>".$tax_term->name."</option>"; // this is the taxonomy slug
								while ($my_query->have_posts()) : $my_query->the_post(); 
								    
									?>
									<option value="<?php the_permalink() ?>">
											<?php 
												the_title_attribute(); // the_title_attribute(); == usermeta.first_name + usermeta.last_name
												?>
									</option>
									<?php
									endwhile;
								}
								echo "</select>";
								$talentcount++;
							wp_reset_query();
						}
					}
				?>
		</div>
		<div class="clearboth"></div>