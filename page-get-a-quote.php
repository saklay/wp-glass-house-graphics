<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	$body = '';
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
			$body .= "Name: \n $name \n\n";
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
			$body .= "Email: \n $email \n\n";
		}
		
		//Check to make sure that the company field is not empty
		if(trim($_POST['company']) === '') {
			$companyError = 'You forgot to enter your company.';
			$hasError = true;
		} else {
			$company = trim($_POST['company']);
			$body .= "Company: \n $company \n\n";
		}
		
		$project = trim($_POST['project']);
		$body .= "Project Request: \n $project \n\n";
			
		//Check to make sure description were entered	
		if(trim($_POST['description']) === '') {
			$descriptionError = 'You forgot to enter your description.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$description = stripslashes(trim($_POST['description']));
			} else {
				$description = trim($_POST['description']);
			}
			$body .= "Description: \n $description \n\n";
		}
		
		//Check to make sure that the budget field is not empty
		if(trim($_POST['budget']) === '') {
			$budgetError = 'You forgot to enter your budget.';
			$hasError = true;
		} else {
			$budget = trim($_POST['budget']);
			$body .= "Budget: \n $budget \n\n";
		}
		
		//Check to make sure timeframe were entered	
		if(trim($_POST['timeframe']) === '') {
			$timeframeError = 'You forgot to enter your timeframe.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$timeframe = stripslashes(trim($_POST['timeframe']));
			} else {
				$timeframe = trim($_POST['timeframe']);
			}
			$body .= "Time frame: \n  $timeframe \n\n";
		}
		
		$otherrequests = trim($_POST['otherrequests']);
		$body .= "Other request: \n $otherrequests \n\n";
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = 'j_m_aldeguer@yahoo.com';
			$subject = 'Glass House Graphics Get a Quote Form Submission from '.$name;
			$headers = 'From: <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;

		}
	}
} ?>

<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/contact-form.js"></script>

<div id="wrapper">
	<div class="articlebody">
	    
	    <?php if(isset($emailSent) && $emailSent == true) { ?>
	    
	        <div class="thanks">
		        <h1>Thanks, <?=$name;?></h1>
		        <p>Your email was successfully sent. We will be in touch soon.</p>
	        </div>
	    
	    <?php } else { ?>
	        
	        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        
	            <div class="post" id="post_<?php the_ID(); ?>">
	                <div class="entry">
	                    <h5>GET A QUOTE</h5>
	                    <hr />
	                    For more details about our services and rates, please contact <a href="mailto:david@glasshousegraphics.com" title="david@glasshousegraphics.com">david@glasshousegraphics.com</a> or check out our Contact page. Please fill out the form below and click Submit Form and we’ll get back to you as soon as possible!
	                    
	                    <?php if(isset($hasError) || isset($captchaError)) { ?>
	                        <p class="error">There was an error submitting the form.<p>
	                    <?php } ?>
	                    
	                    <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
	                        <dl>
								<dt><label for="contactName">Name:</label></dt>
								<dd>
								    <div><input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" /></div>
								    <?php if($nameError != '') { ?>
								        <div class="error"><?=$nameError;?></div> 
								    <?php } ?>
								</dd>
								
								<dt><label for="email">Email:</label></dt>
								<dd>
								    <div><input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" /></div>
								    <?php if($emailError != '') { ?>
								        <div class="error"><?=$emailError;?></div>
								    <?php } ?>
								</dd>
								
								<dt><label for="company">Company:</label></dt>
								<dd>
								    <div><input type="text" name="company" id="company" value="<?php if(isset($_POST['company']))  echo $_POST['company'];?>" class="requiredField company" /></div>
								    <?php if($companyError != '') { ?>
								        <div class="error"><?=$companyError;?></div>
								    <?php } ?>
								</dd>
								
								<dt><label>Project Request</label></dt>
								<dd>
									<input type="radio" name="project" value="advertising" /> Advertising<br />
									<input type="radio" name="project" value="animation" /> Animation<br />
									<input type="radio" name="project" value="comics" /> Comics<br />
									<input type="radio" name="project" value="customcomics" /> Custom Comics<br />
									<input type="radio" name="project" value="illustrations" /> Illustrations<br />
									<input type="radio" name="project" value="conceptualdesigns" /> Conceptual Designs<br />
									<input type="radio" name="project" value="logos" /> Logos<br />
									<input type="radio" name="project" value="modelsculptures" /> Model Sculptures<br />
									<input type="radio" name="project" value="photoretouching" /> Photo Retouching<br />
									<input type="radio" name="project" value="specialtyprinting" /> Specialty Printing<br />
									<input type="radio" name="project" value="storyboards" /> Storyboards<br />
									<input type="radio" name="project" value="webdesigns" /> Web Designs<br />
									<input type="radio" name="project" value="writing" /> Writing
								</dd>
								
								<dt><label for="descriptionText">Description:</label></dt>
								<dd>
								    <div><textarea name="description" id="descriptionText" rows="10" cols="40" class="requiredField"><?php if(isset($_POST['description'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['description']); } else { echo $_POST['description']; } } ?></textarea></div>
								    <?php if($descriptionError != '') { ?>
								        <div class="error"><?=$descriptionError;?></div>
								    <?php } ?>
								</dd>
								
								<dt><label for="budget">How much is your budget? ( in USD $ )</label></dt>
								<dd>
								    <div><input type="text" name="budget" id="budget" value="<?php if(isset($_POST['budget']))  echo $_POST['budget'];?>" class="requiredField budget" /></div>
								    <?php if($budgetError != '') { ?>
								        <div class="error"><?=$budgetError;?></div>
								    <?php } ?>
								</dd>
								
								
								<dt><label for="timeframeText">What is your projected time frame for the project?</label></dt>
								<dd>
								    <div><textarea name="timeframe" id="timeframeText" rows="10" cols="40" class="requiredField"><?php if(isset($_POST['timeframe'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['timeframe']); } else { echo $_POST['timeframe']; } } ?></textarea></div>
								    <?php if($timeframeError != '') { ?>
								        <div class="error"><?=$timeframeError;?></div>
								    <?php } ?>
								</dd>
								
								<dt><label for="otherrequestsText">Any Other request?</label></dt>
								<dd>
								    <div><textarea name="otherrequests" id="otherrequestsText" rows="10" cols="40" class="requiredField"><?php if(isset($_POST['otherrequests'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['otherrequests']); } else { echo $_POST['otherrequests']; } } ?></textarea></div>
								    <?php if($otherrequestsError != '') { ?>
								        <div class="error"><?=$otherrequestsError;?></div>
								    <?php } ?>
								</dd>
								
								<dt></dt>
								<dd><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Submit</button></dd>
							</dl>
	                    </form>
	                    
	                </div>
	            </div>
	        
	        <?php endwhile; ?>
	        <?php else : ?>
	            <div class="post">
			        <div class="entry">
				        <h3>Post not found</h3>
			        </div>
		        </div>
	        <?php endif; ?>
	    
	    <?php } ?>
	    
	</div>
	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
	<div class="clearboth"></div>
</div>

<?php get_footer(); ?>