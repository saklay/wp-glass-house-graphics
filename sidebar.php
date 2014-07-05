<?php
 /*
  *
  * SIDEBAR
  *
 */
?>

	<div class="sidebar">
		<?php 
			// includes twitter balloon
			/* include (TEMPLATEPATH . '/includes/inc_tweetballoon.php'); */
			
			// this image is enclosed in <li> <div class="textwidget"> and </div> </li>
			echo "<ul>";
			dynamic_sidebar( 'rightbanners' ); // just place html image link in a text box widget.
			echo "</ul>";
			
		?>
	</div>