<?php
$xml = simplexml_load_file('xml/copydeck.xml');

?>
<?php include("php/header_agentTest.include.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head profile="http://www.w3.org/2005/10/profile">
	<link rel="icon" 
	      type="image/png" 
	      href="/images/favicon.png" />
	<title><?php echo $xml->aboutUs->meta->pageTitle; ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $xml->aboutUs->meta->keywords; ?>" />
	<meta name="description" content="<?php echo $xml->aboutUs->meta->description; ?>" />

	
	<link rel="stylesheet" href="/css/global.css"/>
	<link rel="stylesheet" href="/css/anytimec.css"/>
	<link rel="stylesheet" href="/css/coin-slider-styles.css" type="text/css" />
	<link rel="stylesheet" href="/css/jquery-ui-1.8.8.custom.css" type="text/css" />
	<!--[if IE]><link rel="stylesheet" href="/css/ie.css" type="text/css" /> <![endif]-->
	<?php echo $ipadStyle; ?>
	
    <!-- start Typekit -->
    <script type="text/javascript" src="http://use.typekit.com/ypk4oxw.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- end Typekit -->
	</head>
	<body class="about_us">
	<script type="text/javascript">
	document.write(unescape('%3Cscript src="' + document.location.protocol + '//d1ivexoxmp59q7.cloudfront.net/imi/live.js" type="text/javascript"%3E%3C/script%3E'));
	</script>
		<div class="bgfix"></div>
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
						<li class="nav4"><a class="selected" href="/about-us">About Travaasa</a></li>
						<li class="nav5"><a href="/contact-us">Contact Us</a></li>
						
					</ul>
				</div><!-- #main_nav -->
				<div class="hide_content_button_container">
					<a href="#" class="hide_content"><img src="/images/btn_hide_content.png" alt="X" /></a>
				</div><!--hide_content_button_container-->
				<div id="top_960"></div><!-- #top_960 -->
				<div id="content_960">
					<div class="left_304">
						<img id="about_image" src="/<?php echo $xml->aboutUs->mainImage->img; ?>" alt="<?php echo $xml->aboutUs->mainImage->caption; ?>" />
						<div id="about_image_text">
							<p><?php echo $xml->aboutUs->mainImage->caption; ?></p>
						</div><!-- #about_image_text -->
					</div><!-- .left_304 -->
                                        
					<div class="right_610">
						<div class="right_610_box" id="about_travaasa">
							<div class="box_610_content_top"></div>
							<div class="box_610_content">
								<h1><?php echo $xml->aboutUs->mainContent->h1; ?></h1>
								<?php echo $xml->aboutUs->mainContent->copy; ?>
							</div><!-- .box_610_content -->
							<div class="box_610_content_bottom"></div><!--box_610_content_bottom-->
						</div><!-- .right_610_box -->
						<?php
							$dex = 1;
							$image_side = "image_left";
							
							foreach($xml->aboutUs->promos->promo as $promo):
							if ($image_side != "image_right"){
								$image_side = "image_right";
							} else {
								$image_side = "image_left";
							}
						?>
						<div class="right_610_box <?php echo $image_side ?>" id="box<?=$dex++?>">
							<div class="box_610_content_top"></div>
							<div class="box_610_content">
								<h2><?php echo $promo->h2; ?></h2>
								<div class="box_610_content_content">
									<p class="content"><?php echo $promo->copy; ?></p>
								</div><!-- .box_610_content_content -->
								<image src="/<?php echo $promo->img; ?>" class="box_610_image" width=197/>
							</div><!-- .box_610_content -->
							<div class="box_610_content_bottom">
								<a href="<?php echo $promo->learnMoreUrl; ?>" class="learn_more"><?php echo $promo->learnMoreText; ?></a>
							</div><!--box_610_content_bottom-->
							<div class="clear"></div>
							
						</div><!-- .right_610_box -->
						<?endforeach;?>
									
					</div><!-- .right_610 -->
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
			foreach($xml->aboutUs->backgroundImages->image as $bg_image):
		?>	
			bg_image[<?php echo $dex; ?>] ='<?php echo $bg_image->src; ?>';
			bg_caption[<?php echo $dex; ?>] ='<?php echo $bg_image->caption; ?>';
			<? $dex++; endforeach; ?>
		</script>
		<div id="background" style="background-image:url(/<?php echo $xml->aboutUs->backgroundImages->image->src; ?>)">
		</div><!-- #background -->

		<?php include("php/footer_social.include.php"); ?>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>

		<script src="/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="/js/anytimec.js"></script>
		<script type="text/javascript" src="/js/jquery.bgfix.js"></script>
	<!--	<script type="text/javascript" src="js/coin-slider.min.js"></script>-->
		<script type="text/javascript" src="/js/application.js"></script>
	<!--
		<script type="text/javascript">
			$(document).ready(function() {
				$('#coin-slider').coinslider({ width: 928, height:286, navigation: true, delay: 5000, effect: "straight", spw:3, sph:3 });
			});
		</script>
	-->
		<script type="text/javascript">
		$(document).ready(function () {
			$('#background').bgfix();
		});
		</script>

		</body>
	</html>
