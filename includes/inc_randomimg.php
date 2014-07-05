<?php 
/* 
 * Name your images 1.jpg, 2.jpg etc. 
 * 
 * Add this line to your page where you want the images to
 * appear: <?php include "randomimage.php"; ?> 
 */

// Change this to the total number of images in the folder 
$total = "2"; 

// Change to the type of files to use eg. .jpg or .gif 
$file_type = ".jpg"; 

// Change to the location of the folder containing the images 
$image_folder = ""; 

// You do not need to edit below this line 

$start = "1"; 

$random = mt_rand($start, $total); 

$image_name = $random . $file_type; 

?>