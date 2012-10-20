<?php
$xml = simplexml_load_file('xml/copydeck.xml');

?>
<?php include("php/header_agentTest.include.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head profile="http://www.w3.org/2005/10/profile">

	<title>
    	<?php 
      	if($xml->index->meta->pageTitle=='') 
        	echo "Travaasa - Real Travel for Real Experiences";
      	else
        	echo $xml->index->meta->pageTitle;
	?>
	</title>
	<meta name="keywords" content="<?php echo $xml->index->meta->keywords; ?>" />
	<meta name="description" content="<?php echo $xml->index->meta->description; ?>" />
	
	<link rel="stylesheet" href="/css/global.css"/>
	<link rel="stylesheet" href="/css/anytimec.css"/>
	<link rel="stylesheet" href="/css/fadeSlideShow.css" type="text/css" />
	<link rel="stylesheet" href="/css/jquery-ui-1.8.8.custom.css" type="text/css" />
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?v=2.0.4" type="text/css" media="screen" />
        
	<?php echo $ipadStyle; ?>
	<!--[if IE]><link rel="stylesheet" href="/css/ie.css" type="text/css" /> <![endif]-->
        <style type="text/css">

        </style>
    <!-- begin Typekit -->
    <script type="text/javascript" src="http://use.typekit.com/ypk4oxw.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- end Typekit -->    
    <!-- start Adserving Tag -->
    <script type='text/javascript'>
	// Conversion Name: Travaasa Home Page
	var ebRand = Math.random()+'';
	ebRand = ebRand * 1000000;
	//<![CDATA[ 
	document.write('<scr'+'ipt src="HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=213436&amp;rnd=' + ebRand + '"></scr' + 'ipt>');
	//]]>
	</script>
	<noscript>
	<img width="1" height="1" style="border:0" src="HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=213436&amp;ns=1"/>
	</noscript>
	<!-- end Adserving Tag-->
        </head>
	<body class="index">
		<!-- start IMI -->
		<script type="text/javascript">
		document.write(unescape('%3Cscript src="' + document.location.protocol + '//d1ivexoxmp59q7.cloudfront.net/imi/live.js" type="text/javascript"%3E%3C/script%3E'));
		</script>
		<!-- end IMI -->
		<!-- start Retargeting Tag -->
		<script type="text/javascript">
		// Retargeting Tag Name: Travaasa Home Page Retargeting
		// The retargeting Tags should be placed at the top of the <BODY> section of the HTML page.
		var ebRand = Math.random()+ ' ';
		ebRand = ebRand * 1000000;
		//<![CDATA[
		document.write('<scr'+'ipt src="HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?CN=TT&amp;TID=4095&amp;AdvertiserID=52437&amp;TKV0=z&amp;rnd=' + ebRand + '"></scr' + 'ipt>');
		//]]>
		</script>
		<noscript>
		<img width="1" height="1" style="border:0" src="HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?CN=TT&amp;TID=4095&amp;AdvertiserID=52437&amp;TKV0=z&amp;ns=1"/>
		</noscript>
		<!-- end Retargeting Tag -->
		
		<div id="page_content">
			<div class="content_wrapper">
				<div id="header_frame">
					<div id="logo">
						<a href="/home/"><img src="/images/global/logo_main.png" height="157" /></a>
					</div><!-- #logo -->
					<div id="reservation_cta">
						<p class="reservation_title">1-855-TO-TRAVAASA  (1-855-868-7282)</p>
                                                <div id="book-buttons">
                                                <div id="book-hana"><a href="https://gc.synxis.com/rez.aspx?Hotel=26987&Chain=10237&template=HNMHM&shell=HNMHM2&adult=2" target="_blank" onclick="_gaq.push(['_link', 'https://gc.synxis.com/rez.aspx?Hotel=26987&Chain=10237&shell=HNMHM2&adult=2']); return false;">Book Hana</a></div>
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
						<li class="nav5"><a href="/contact-us">Contact Us</a></li>
						
					</ul>
				</div><!-- #main_nav -->
				<div class="hide_content_button_container">
					<a href="#" class="hide_content"><img src="/images/btn_hide_content.png" alt="X" /></a>
				</div><!--hide_content_button_container-->
				<div id="top_960"></div><!-- #top_960 -->
                                <div id="content_960">
                                    
					<div id="slideshow_frame_2">
						<img src="/images/global/ajax-loader.gif" alt="loading" class="ajax_loader" />
					<div id="slideshow_frame">
                                            
						<div id='p_slideshow'>	
                                                    <ul class='slideshow'>
							<?php
								$ct = count($xml->index->slideshow->image);
								foreach($xml->index->slideshow->image as $s_image):
							?>	
							
							<li>
                                                            <a href='<?php print $s_image->link ?>'><img src='/<?php echo $s_image->img; ?>' width="960" height="375"></a>

							</li>
							<?endforeach;?>
                                                    </ul>
                                                   
						</div><!--p_slideshow-->
						
					</div><!-- #slideshow_frame -->
					</div><!-- #slideshow_frame_2 -->
				<?php
				/*
					<div id="home_promoRowof3">
						<?php
							$dex = 1;
							foreach($xml->index->promos->promo as $promo):
						?>
						<div class="home_promo" id="home_promo<?=$dex++?>">
							<img src="/<?php echo $promo->img; ?>" width=84 height=78 />
							<div class="promo_content">	
								<h3><?php echo $promo->h3; ?></h3>
								<p class="promo_copy content"><?php echo $promo->copy; ?></p>
							</div><!-- .promo_content -->
							<a href="<?php echo $promo->learnMoreUrl; ?>" class="learn_more" <?php if ( $promo->h3 == 'Hit The Lights' ) { echo 'target="_blank"'; } ?>>Learn More ></a>
						</div><!-- .home_promo -->
						<?endforeach;?>
					
					</div><!-- #home_promoRowof3 -->
				*/
				?>
					<div class="clear"></div>
					<div id="main_content">
						
						<div id="main_content_content">
							<div class="main_content_container" style="width: 560px;">
								<h1><?php echo $xml->index->mainContent->h1; ?></h1>
					
								<?php echo $xml->index->mainContent->copy; ?>
							</div><!--main_content_container-->
							<div class="promo_container">

                                                                    <ul style="" id="promocarousel" class="jcarousel-skin-tango slideshow">
                                                                    <?php
                                                                        foreach($xml->index->promos->promo as $promo){
                                                                            print(
                                                                                 "<li>
                                                                                    <div style='position: relative'>
                                                                                        <a href='$promo->learnMoreUrl'>
                                                                                            <img src='/$promo->img' width='400' height='176' />
                                                                                        </a>
                                                                                        <h3 class='promo_head'>$promo->h3</h3>
                                                                                        <div class='promo_copy'>$promo->copy</div>
                                                                                        
                                                                                    </div>
                                                                                  </li>\n"
                                                                                 );
                                                                        } 
                                                                    ?>
                                                                    </ul>
                                                            <!--
                                                            <li>
                                                                                <div style='position:absolute; width: 479px; height: 176px; z-index: 49'><img src='/$promo->img' /></div>"
                                                                                ."<div style=\"font-family: 'Gill Sans', 'LatoRegular', sans-serif; padding: 11px; height: 71px; font-size: 16px; z-index: 50; width: 340px; position: absolute; color: white; bottom: 0;\"><h3 style='font-size: 23px; color: #FFF'>".$promo->h3."</h3>"
                                                                                .$promo->copy."</div><br />".
                                                                            "</li>
                                                            -->
                                                        </div><!--promo_container-->
							<div class="clear"></div>
						</div><!-- #main_content_content -->
						
					</div><!-- #main_content -->
					
					
				</div><!-- #content_960 -->
				<div id="bottom_960"></div><!-- #bottom_960 -->
				
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
			foreach($xml->index->backgroundImages->image as $bg_image):
		?>	
			bg_image[<?php echo $dex; ?>] ='<?php echo $bg_image->src; ?>';
			bg_caption[<?php echo $dex; ?>] ='<?php echo $bg_image->caption; ?>';
			<? $dex++; endforeach; ?>
		</script>
		
		
		<?php include("php/footer_social.include.php"); ?>
		
		<div id="background" style="background-image:url(/<?php echo $xml->index->backgroundImages->image->src; ?>)">
		</div><!-- #background -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/js/anytimec.js"></script>
		<script type="text/javascript" src="/js/jquery.bgfix.js"></script>

		<script src="/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="/js/fadeSlideShow-minified.js"></script>
		<script type="text/javascript" src="/js/application.js"></script>
                <script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.pack.js?v=2.0.4"></script> 
                <script type="text/javascript" src="/js/jquery.cycle.all.js"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                        $('.slideshow').each(function(){
                           $(this).cycle({
                                timeout: 7000,
                                speed: 800
                           }); 
                        });
                        $('#p_slideshow ul')
                            .after("<div id='nav'>")
                            .cycle({
                            pager: '#nav'

                        });
                        $('#promocarousel, #promo_nav, .promo_container')
                        .css({opacity: 0.0, visibility: "visible"})
                        .animate({opacity: 1.0});
                        $('#promocarousel')
                        .after("<div id='promo_nav'>")
                        .cycle({
                            pager: '#promo_nav'
                        });
                        function onAfter(curr,next,opts) {
                            var caption =  (opts.currSlide + 1) + ' of ' + opts.slideCount;
                            $('#count').html(caption);
                        }
                        $('#promo_nav a, #nav a').click(function(){
                            $('#promocarousel, #p_slideshow ul').cycle('pause');
                        })
                    });
                </script>

	</body>

</html>
