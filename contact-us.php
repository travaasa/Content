<?php
$xml = simplexml_load_file('xml/copydeck.xml');

?>
<?php
$message_sent = "";
$error_message = "";
$error_email = "";
$error_question = "";
$error_name = "";
if(isset($_POST['submit'])) {
	$error_count = 0;
	$to_email = "signup@travaasa.com";
	$subject = "Question from Web Site.";
	$from_email = $_POST ['email_address'];
        $reply_email = $_POST['email_address'];
	$from_name = $_POST['name'];
        $reply_to = '"' . $_POST['name'] . '" <' . $_POST['email_address'] . '>';
	$question = $_POST['question'];
	ini_set("sendmail_from", $from_email);

	
	$headers = "From: $from_email\r\n" .
            "Reply-To: $reply_to\r\n" . 
	    "X-Mailer: php";
	$GA_error_js = "";

/* PHP form validation: the script checks that the Email field contains a valid email address and the Subject field isn't empty. preg_match performs a regular expression match.  */

	if ($reply_email == ""){
		$error_email = "<h4>Please enter an email address</h4>";
		$error_count++;
	} elseif (!preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/', $reply_email)) {
	  $error_email = "<h4>Invalid email address</h4>";
	  $error_count++;
	} 
	if ($question == "") {
	  $error_question = "<h4>Please enter a question.</h4>";
	  $error_count++;
	} 
	if ($from_name == "") {
	  $error_name = "<h4>Please enter your name.</h4>";
	  $error_count++;
	}

	/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
	if($error_count == 0){
		if (mail($to_email,$subject,$question,$headers)) {
		  $message_sent = "<h4>Thank you for your interest in Travaasa. We'll be in touch soon.</h4>";
		  $GA_success_js .= "_gaq.push(['_trackEvent', 'Contact Us', 'button', 'Success']);";
	    
		} else {
		  $error_message = "<h4>There was an error sending your question. Please try again.</h4>";
		  $GA_error2_js .= "_gaq.push(['_trackEvent', 'Contact Us', 'button', 'Failure-Server Error']);";
	    
		}
	} else { //end error count
	
    $GA_error_js .= "_gaq.push(['_trackEvent', 'Contact Us', 'button', 'Failure-Visitor Error']);";
		
	}
}//end if submitted


?>
<?php include("php/header_agentTest.include.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head profile="http://www.w3.org/2005/10/profile">
	<link rel="icon" 
	      type="image/png" 
	      href="/images/favicon.png" />
	<title><?php echo $xml->contact->meta->pageTitle; ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $xml->contact->meta->keywords; ?>" />
	<meta name="description" content="<?php echo $xml->contact->meta->description; ?>" />
	
	<link rel="stylesheet" href="/css/global.css"/>
	<link rel="stylesheet" href="/css/anytimec.css"/>
	<link rel="stylesheet" href="/css/coin-slider-styles.css" type="text/css" />
	<link rel="stylesheet" href="/css/jquery-ui-1.8.8.custom.css" type="text/css" />
	<link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />	
	<!--[if IE]><link rel="stylesheet" href="/css/ie.css" type="text/css" /> <![endif]-->
	<?php echo $ipadStyle; ?>
	
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
	
	<script src="/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="/js/anytimec.js"></script>
	<script type="text/javascript" src="/js/jquery.bgfix.js"></script>
	<script type="text/javascript" src="/js/ajax.js"></script>
	<script type="text/javascript" src="/js/application.js"></script>
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<!--	<script type="text/javascript">
		$(document).ready(function() {
			$('#coin-slider').coinslider({ width: 928, height:286, navigation: true, delay: 5000, effect: "straight", spw:3, sph:3 });
		});
	</script>
-->
	<script type="text/javascript">
	$(document).ready(function () {
		$('a.fancy').fancybox(); 
		$('#background').bgfix();
                $('#form_submit').click(function(){
                    var email = $('#email_special_offers').val();
                    if(email!="")
                        window.location = 'http://www.data2gold.com/gallery/travaasa/eClub/eClub.asp?email='+$('#email_special_offers').val(); 
                    
                });
	});
	</script>
	<!-- start Typekit -->
    <script type="text/javascript" src="http://use.typekit.com/ypk4oxw.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- end Typekit -->
	</head>
	<body class="contact_us">
	<script type="text/javascript">
	document.write(unescape('%3Cscript src="' + document.location.protocol + '//d1ivexoxmp59q7.cloudfront.net/imi/live.js" type="text/javascript"%3E%3C/script%3E'));
	</script>

		<div id="page_content">
			<div class="content_wrapper">
				<div id="header_frame">
					<div id="logo">
						<a href="/home/"><img src="/images/global/logo_main.png" height="157" /></a>
					</div><!-- #logo -->
					<div id="reservation_cta">
						<p class="reservation_title">1-855-TO-TRAVAASA  (1-855-868-7282)</p>
                                                <div id="book-buttons">
                                                <div id="book-hana"><a href="https://gc.synxis.com/rez.aspx?Hotel=26987&Chain=10237&template=HNMHM&shell=HNMHM2&adult=2" target="_blank" onclick="_gaq.push(['_link', 'https://gc.synxis.com/rez.aspx?Hotel=26987&Chain=10237&template=HNMHM&shell=HNMHM2&adult=2']); return false;">Book Hana</a></div>
						<div id="book-austin"><a href="https://gc.synxis.com/rez.aspx?Hotel=28064&Chain=10237&template=AUSTC&shell=AUSTC4" target="_blank" onclick="_gaq.push(['_link', 'https://gc.synxis.com/rez.aspx?Hotel=28064&Chain=10237&template=AUSTC&shell=AUSTC4']); return false;">Book Austin</a></div>
                                                <div class="clearbox"></div>
                                                <div id="getonthelist"><a href="http://www.data2gold.com/gallery/travaasa/eClub/eClub.html">Get on the list</a></div>
                                                </div>
					</div><!-- #reservation_cta -->
				</div><!-- #header_frame -->
				<div class="clear"></div>
				<div id="main_nav">
					<ul>
<!--						<li class="nav0"><a href="/home">Home</a></li>-->
						<li class="nav1"><a href="/austin">Travaasa Austin</a></li>
						<li class="nav2"><a href="/hana">Travaasa H&#257;na</a></li>
						<li class="nav3"><a href="/experiences">Experiences</a></li>
						<li class="nav4"><a href="/about-us">About Travaasa</a></li>
						<li class="nav5"><a class="selected" href="/contact-us">Contact Us</a></li>
						
					</ul>
				</div><!-- #main_nav -->
				<div class="hide_content_button_container">
					<a href="#" class="hide_content"><img src="/images/btn_hide_content.png" alt="X" /></a>
				</div><!--hide_content_button_container-->
				<div id="top_960"></div><!-- #top_960 -->
				<div id="content_960">
					<div class="left_610">
						<div class="right_610_box" id="about_travaasa">
							<div class="box_610_content_top"></div>
							<div class="box_610_content">
								<h1>Contact Us</h1>
								<p  class="content">Are you ready to Travaasa? Start your journey today and get ready to experience the world in a completely different way. Call 855-TO-TRAVAASA (855-868-7282) to book your stay.</p>
								<p>Interested in a career with Travaasa?  Visit our <a href="http://theapplicantmanager.com/php/careers.php?co=tv" target="_blank">careers page</a>.</p>
							</div><!-- .box_610_content -->
							<div class="box_610_content_bottom"></div><!--box_610_content_bottom-->
						</div><!-- .right_610_box -->
						<div class="right_610_box image_left" id="box2">
							<div class="box_610_content_top"></div>
							<div class="box_610_content">
								<image src="/images/site/contact-us-austin.jpg" class="box_610_image" />
								<div class="box_610_content_content">
									<h1>Travaasa Austin</h1>
									<p class="content"><a href="http://maps.google.com/maps?hl=en&q=travaasa+austin&safe=off&ie=UTF8&sqi=2&hq=travaasa&hnear=Austin,+Travis,+Texas&t=m&vpsrc=6&ll=30.45844,-97.835999&spn=0.12326,0.221786&z=13&iwloc=A&cid=5151063792531704065" target="_blank">13500 Farm to Market Road 2769<br>Austin, TX 78726</a></p>
									<p class="content">Reservations &amp; Spa:<br/> 855-TO-TRAVAASA (855-868-7282)<br><a href="mailto:austin@travaasa.com" onClick="_gaq.push(['_trackEvent', 'Contact Us', 'Exit Link', 'Email Austin Reservations']);">austin@travaasa.com</a><br><br>Main:&nbsp;512-258-7243<br />Fax:&nbsp;512-506-9737<br /><br>Group Sales:&nbsp;512-334-4649<br><a href="mailto:austinsales@travaasa.com" onClick="_gaq.push(['_trackEvent', 'Contact Us', 'Exit Link', 'Email Austin Sales']);">austinsales@travaasa.com</a><br /></p>
								</div><!-- .box_610_content_content -->
								<div class="clear"></div>
							</div><!-- .box_610_content -->
							<div class="box_610_content_bottom">
							</div><!--box_610_content_bottom-->
							
						</div><!-- .right_610_box -->
						<div class="right_610_box image_left" id="box1">
							<div class="box_610_content_top"></div>
							<div class="box_610_content">
								<image src="/images/site/contact-us-hana.jpg" class="box_610_image" />
								<div class="box_610_content_content">
									<h1>Travaasa Hana</h1>
									<p class="content"><a href="http://maps.google.com/maps?hl=en&q=5031+Hana+Highway+Hana,+HI+96713&gs_upl=3125l8296l0l9305l5l5l0l0l0l1l203l724l1.3.1l5l0&bav=on.2,or.r_gc.r_pw.,cf.osb&biw=638&bih=933&um=1&ie=UTF-8&hq=&hnear=0x7954ac25effd1793:0x535647e82e0e776,5031+Hana+Hwy,+Hana,+HI+96713&gl=us&ei=Hh4GT_KFB4nE2wX9zIn5CQ&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CB0Q8gEwAA5" target="_blank">5031 Hana Hwy<br>Hana, Hi 96713</a></p>
									<p class="content">Reservations &amp; Spa:<br/> 855-TO-TRAVAASA (855-868-7282)<br><a href="mailto:hana@travaasa.com" onClick="_gaq.push(['_trackEvent', 'Contact Us', 'Exit Link', 'Email Hana Reservations']);">hana@travaasa.com</a><br><br>Main:&nbsp;808-248-8211<br />Fax:&nbsp;808-248-7202<br /><br/>Group Sales: 808-248-8211<br><a href="mailto:hanasales@travaasa.com" onClick="_gaq.push(['_trackEvent', 'Contact Us', 'Exit Link', 'Email Hana Sales']);">hanasales@travaasa.com</a><br /></p>									
							</div><!-- .box_610_content_content -->
								<div class="clear"></div>
								
								</div><!-- .box_610_content -->
							<div class="box_610_content_bottom">
							</div><!--box_610_content_bottom-->
							<div class="clear"></div>
							
						</div><!-- .right_610_box -->
						<div class="clear"></div>
						
					</div><!-- #left_610 -->
					<div class="right_304">
						<div class="contact_us_form_container">
							<?php  
							//Special Offers form
							//uses ajax to submit
							?>
							<form id="contact-form" name="contact-form" method="post" action="/php/contact-send.php">
								<h5>Receive special offers and updates</h5>
								<label for="email_special_offers">E-mail Address</label><span class="required">*</span><div class="error"><?php echo $error_email_special_offers; ?></div><input type="text" name="email_special_offers" value="<?php echo $_POST['email_special_offers']; ?>" id="email_special_offers" />
								<input type="button" name="button" id="form_submit" value="submit" class="submit_special_offer_sign_up" onclick="javascript:gotoMailingList()" />
                   				<!--<img id="loading" src="/images/ajax-load.gif" width="16" height="16" alt="loading" />-->
                   				<p class='hide' id='response'></p>
							<div class="clear"></div><!--clear-->
							</form>
							
							
							
							<?php
							//FULL SIGN UP FORM
							if ($message_sent == "" && $error_message == ""):
							?>
							<script type="text/javascript">
								$(document).ready(function() {
							<?php
							if ($GA_error_js != ""){
								echo $GA_error_js;
							}
							?>
								});
							</script>
						<div class="full_sign_up_form">
							<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
								<h3>Questions?</h3>
								<label for="name">Name</label><span class="required">*</span><div class="error"><?php echo $error_name; ?></div><input type="text" name="name" value="<?php echo $_POST['name']; ?>" id="name" />
								<label for="email_address">E-mail Address</label><span class="required">*</span><div class="error"><?php echo $error_email; ?></div><input type="text" name="email_address" value="<?php echo $_POST['email_address']; ?>" id="email_address" />
								<label for="question">Question</label><span class="required">*</span><div class="error"><?php echo $error_question; ?></div><textarea name="question" value="<?php echo $_POST['question']; ?>" id="question" rows="14" cols="32" class="textarea" style="resize:none;"></textarea>
								
								<input type="submit" value="Submit" name="submit" class="submit_contact_form" />		
							</form>
						</div><!-- class="full_sign_up_form" -->
							<?php else: ?>
							<?php 
							echo $message_sent;
							echo $error_message;
							?>
							<script type="text/javascript">
								$(document).ready(function() {
							<?php
							if ($GA_error2_js != ""){
								echo $GA_error2_js;
							}
							if ($GA_success_js != ""){
								echo $GA_success_js;
							}
							?>
								});
							</script>
							<?php endif ?>
						</div><!-- .contact_us_form_container -->
					</div><!-- .right_304 -->
					<div class="clear"></div>
				</div><!-- #content_960 -->
				<div id="bottom_960"></div><!-- #bottom_960 -->
				<div id="page_level_footer">
					<p>Call 855-TO-TRAVAASA (855-868-7282) to book your stay.</p>
					<div class="clear"></div>
				</div><!-- #page_level_footer -->
				<div class="clear"></div>
			</div><!-- .content_wrapper -->
			<div class="clear"></div>
		</div><!-- #page_content -->
		<div class="clear"></div>
		<script>
		var bg_image = new Array();
		var bg_caption = new Array();
		<?php 
			$dex = 0;
			foreach($xml->contact->backgroundImages->image as $bg_image):
		?>	
			bg_image[<?php echo $dex; ?>] ='<?php echo $bg_image->src; ?>';
			bg_caption[<?php echo $dex; ?>] ='<?php echo $bg_image->caption; ?>';
			<? $dex++; endforeach; ?>
		</script>
		<div id="background" style="background-image:url(/<?php echo $xml->contact->backgroundImages->image->src; ?>)">
		</div><!-- #background -->

		<?php include("php/footer_social.include.php"); ?>


		</body>
	</html>
