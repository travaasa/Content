<?php

header( "location: /home/" );

exit();

$xml = simplexml_load_file('xml/copydeck.xml');

?>
<?php include("php/header_agentTest.include.php"); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
	<title><?php echo $xml->intro->meta->pageTitle; ?></title>
		
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $xml->index->meta->keywords; ?>" />
	<meta name="description" content="<?php echo $xml->index->meta->description; ?>" />
	
	<link rel="stylesheet" href="/css/global.css"/>
	<link rel="stylesheet" href="/css/anytimec.css"/>
	<link rel="stylesheet" href="/css/fadeSlideShow.css" type="text/css" />
	<link rel="stylesheet" href="/css/jquery-ui-1.8.8.custom.css" type="text/css" />
	<link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />	
	<?php echo $ipadStyle; ?>
	<!--[if IE]><link rel="stylesheet" href="/css/ie.css" type="text/css" /> <![endif]-->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/js/jquery.bgfix.js"></script>
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>	
	<script type="text/javascript">
	$(document).ready(function () {
		$('a.fancy').fancybox(); 
		$('#background').bgfix();
	});
	</script>
	<!-- start Typekit -->
    <script type="text/javascript" src="http://use.typekit.com/ypk4oxw.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- end Typekit -->
        </head>
	<body class="intro">
	<script type="text/javascript">
	document.write(unescape('%3Cscript src="' + document.location.protocol + '//d1ivexoxmp59q7.cloudfront.net/imi/live.js" type="text/javascript"%3E%3C/script%3E'));
	</script>
		
		<div id="page_content">
			<div class="content_wrapper">
				<div id="header_frame">
					<div id="logo">
						<a href="/home/"><img src="images/global/logo_main.png" height="157" /></a>
					</div><!-- #logo -->
						</div><!-- #header_frame -->
				<div class="clear"></div>
				<div id="main_nav">
						
				</div><!-- #main_nav -->
				<div class="intro_image">
					<a href="/home/"><img src="/images/intro_page_content.png" alt="click to enter Travaasa" /></a>
				</div><!--intro_image-->
				<div class="clear"></div>
			</div><!-- .content_wrapper -->
			<div class="clear"></div>
		</div><!-- #page_content -->
		<div class="clear"></div>
		<div id="background" style="background-image:url(/<?php echo $xml->intro->backgroundImages->image->src; ?>)">
		</div><!-- #background -->
		
		<?php include("php/footer_social.include.php"); ?>
		
		
		
	</body>

</html>
