<?php
	
	/* custom login logo */
	add_action('login_head', 'my_custom_login_logo');
	function my_custom_login_logo() {
		echo '<style type="text/css">
			h1 a { background-image:url('.get_bloginfo('template_directory').'/images/wp-login-logo.gif) !important; margin-bottom:20px; }
		</style>';
	}
	
	/* custom dashboard logo */
	add_action('admin_head', 'my_custom_logo');
	function my_custom_logo() {
		echo '
			<style type="text/css">
				#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/custom-logo.gif) !important; }
			</style>
		';
	}
	
	/* Disable the �please upgrade now� message */
	if ( !current_user_can( 'edit_users' ) ) {
		add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
		add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
		}

	/* Disable the Admin Bar for all. 
	 delete for WP < 3.0.0 */
	show_admin_bar(false);

	/* SIDEBARS */
	register_sidebar(array(
		'name' => 'Right Banner Sidebar',
		'id' => 'rightbanners',
		'before_widget' => '<li>',
		'after_widget' => "</li>",
		'before_title' => "<h5>",
		'after_title' => "</h5>",
		));

	register_sidebar(array(
		'name' => 'Featured Artists',
		'id' => 'featuredartists',
		'before_widget' => '<li>',
		'after_widget' => "</li>",
		));

	/* ENABLE POST THUMBNAILS */
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 200, true ); 
		add_image_size( 'single-post-thumbnail', 200, 200 ); 
		add_image_size( 'blogpost', 141, 84, true ); 
		}
	
	/* improve WP's excerpt() */
	function improved_trim_excerpt($text) {
		global $post;
		if ( '' == $text ) {
			$text = get_the_content('');
			$text = apply_filters('the_content', $text);
			$text = str_replace('\]\]\>', ']]>', $text);
			$excerpt_length = 40;
			$words = explode(' ', $text, $excerpt_length + 1);
			if (count($words)> $excerpt_length) {
				array_pop($words);
				array_push($words, '[...]');
				$text = implode(' ', $words);
				$text = force_balance_tags( $text );
			}
		}
		return $text;
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'improved_trim_excerpt');	
		
	/* ADDS CUSTOM USER PROFILE	
	 source: http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields */
	add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
	add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

	function my_show_extra_profile_fields( $user ) { ?>

	<h3>Profile that will show in Talent page</h3>

	<table class="form-table">
		<tr>
			<th><label for="position">Position</label></th>
			<td>
				<input type="text" name="ghg_position" id="position" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'ghg_position', $user->ID ) ); ?>" /><br />
				<span class="description">Please enter your Position or Job Description.</span>
			</td>
		</tr>
		<tr>
			<th><label for="birthday">Birthday</label></th>
			<td>
				<input type="text" name="ghg_birthday" id="birthday" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'ghg_birthday', $user->ID ) ); ?>" /><br />
				<span class="description">Please enter your birthday.</span>
			</td>
		</tr>
		<tr>
			<th><label for="civilstat">Civil Status</label></th>
			<td>
				<input type="text" name="ghg_civilstat" id="civilstat" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'ghg_civilstat', $user->ID ) ); ?>" /><br />
				<span class="description">Please enter your civil status.</span>
			</td>
		</tr>
		<tr>
			<th><label for="favfruit">Favorite Artist</label></th>
			<td>
				<input type="text" name="ghg_favartist" id="favartist" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'ghg_favartist', $user->ID ) ); ?>" /><br />
				<span class="description">Please enter your favorite artist.</span>
			</td>
		</tr>
		<tr>
			<th><label for="blog">Blog</label></th>
			<td>
				<input type="text" name="ghg_blogurl" id="blog" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'ghg_blogurl', $user->ID ) ); ?>" /><br />
				<span class="description">Please enter your blog URL (include "http://").</span>
			</td>
		</tr>
	</table>
	<?php }

	add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
	add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

	function my_save_extra_profile_fields( $user_id ) {
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;
		
		update_usermeta( $user_id, 'ghg_position', $_POST['ghg_position'] );
		update_usermeta( $user_id, 'ghg_birthday', $_POST['ghg_birthday'] );
		update_usermeta( $user_id, 'ghg_civilstat', $_POST['ghg_civilstat'] );
		update_usermeta( $user_id, 'ghg_favartist', $_POST['ghg_favartist'] );
		update_usermeta( $user_id, 'ghg_blogurl', $_POST['ghg_blogurl'] );
		} /* END of CUSTOM USER PROFILE	 */
		
	
	/* remove Meteor Slides' JS to avoid conflict with other scripts */
	function remove_ms_header() {
		if ( !is_front_page() ){
			remove_action('wp_print_scripts', 'meteorslides_javascript');
			remove_action('wp_enqueue_scripts', 'meteorslides_css');
			}
		}
	add_action('wp_print_scripts', 'remove_ms_header', 1);
	add_action('wp_enqueue_scripts', 'remove_ms_header', 1);
	
	/* CUSTOM POST TYPES */
	function create_post_type() {
		register_post_type( 'ghg_podcast',
			array(
				'labels' => array(
					'name' => __( 'Podcasts' ),
					'singular_name' => __( 'Podcast' )
				),
				'public' => true,
				'rewrite' => array('slug' => 'ghg_podcast'),
				'supports' => array (
					'title',
					'editor',
					'author',
					'thumbnail',
					'custom-fields'
					)
			)
		);
		register_post_type( 'ghg_talents',
			array(
				'labels' => array(
					'name' => __( 'Talents' ),
					'singular_name' => __( 'Talent' )
				),
				'public' => true,
				'capability_type' => 'post',
				'rewrite' => array("slug" => "talents"), 
				'supports' => array (
					'title',
					'editor',
					'author',
					'thumbnail',
					'custom-fields'
					)
			)
		);
		register_post_type( 'ghg_interview',
			array(
				'labels' => array(
					'name' => __( 'Interviews' )
				),
				'public' => true,
				'capability_type' => 'post',
				'rewrite' => array('slug' => 'ghg_interview'),
				'supports' => array (
					'title',
					'editor',
					'author',
					'thumbnail',
					'custom-fields'
					)
			)
		);
	} 
	add_action( 'init', 'create_post_type' );

	/* REGISTER POSITION TAXONOMY */
	add_action( 'init', 'ghg_create_position_taxonomies', 0 );
	/* ADDS POST THUMBNAIL IN CUSTOM POST TYPE "ghg_talents" and "ghg_interview" */
	add_theme_support( 'post-thumbnails', array( 'post', 'ghg_talents', 'ghg_interview' ) );
	function ghg_create_position_taxonomies() {
		register_taxonomy(
			'talent', 
			'ghg_talents',
			array( 
				'sort' => true, 
				'label' => __('Talent Position', 'series'), 
				'query_var' => 'Talent', 
				'rewrite' => array( 'slug' => 'talent' ) 
				) 
		);
	}
	
	/* Allowing WordPress Contributors to Upload Files
	 http://soulsizzle.com/quick-tips/allowing-wordpress-contributors-to-upload-files/ */
	if ( current_user_can('contributor') && !current_user_can('upload_files') )
	add_action('admin_init', 'allow_contributor_uploads');
	function allow_contributor_uploads() {
		$contributor = get_role('contributor');
		$contributor->add_cap('upload_files');
	}
	if ( current_user_can('contributor') && !current_user_can('edit_published_posts') )
	add_action('admin_init', 'allow_contributor_edit_published_posts');
	function allow_contributor_edit_published_posts() {
		$contributor = get_role('contributor');
		$contributor->add_cap('edit_published_posts');
	}	
	

	
	/* remove some menu in dashboard for role < 3 */
	function remove_menus () {
		global $menu;
			$restricted = array(__('Dashboard'), __('Posts'), __('Links'), __('Media'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'), __('Podcasts'), __('Slides'));
			end ($menu);
			while (prev($menu)){
				$value = explode(' ',$menu[key($menu)][0]);
				if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
			}
		}
	if ($current_user->user_level < 3) 
		add_action('admin_menu', 'remove_menus');

	// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS
	function all_settings_link() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
	}
	add_action('admin_menu', 'all_settings_link');

 	
?>