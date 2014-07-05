<?php
/*
 * Template Name: Change Twitter User
 *
 */ ?>

 		<?php
			include(TEMPLATEPATH . '/twitterwidget/twitterstatus.php');
			$t = new TwitterStatus('davidcampitighg', 5); // change username here!!!
			echo $t->Render();
		?>
 		<a href="http://twitter.com/davidcampitighg" title="follow @DavidCampitiGHG on Twitter" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitter-jinky.png" alt="Follow us on Twitter" /><a/>