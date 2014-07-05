<?php 
/*
 *
 */ 
get_header(); ?>	

<div id="wrapper">
	<div class="articlebody">
	
		
<?php global $wp_query;
		$curauth = $wp_query->get_queried_object();

      echo 'Username: ' . $curauth->user_login . "\n";
      echo 'User email: ' . $curauth->user_email . "\n";
      echo 'User first name: ' . $curauth->user_firstname . "\n";
      echo 'User last name: ' . $curauth->user_lastname . "\n";
      echo 'User display name: ' . $curauth->display_name . "\n";
      echo 'User ID: ' . $curauth->ID . "\n";
      echo 'ghg_twitter: ' . $curauth->ghg_twitter . "\n";
      echo 'ghg_position: ' . $curauth->ghg_position . "\n";
      echo 'ghg_birthday: ' . $curauth->ghg_birthday . "\n";
      echo 'ghg_civilstat: ' . $curauth->ghg_civilstat . "\n";
      echo 'ghg_favfruit: ' . $curauth->ghg_favfruit . "\n";
      echo 'ghg_blogurl: ' . $curauth->ghg_blogurl . "\n";
	  echo 'description: ' . $curauth->description . "\n";
?> 	

		
		
		
	</div>
	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
	<div class="clearboth"></div>
</div>
<?php get_footer(); ?>