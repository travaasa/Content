//-----------------------------------------------------------------
//	website: 	Travaasa
//	type:		js
//	desc:		full site
//	Date:       2011
//	Dependencies: (list jQuery version, and other plugins)  
//                jQuery Address, livequery            
//------------------------------------------------------------------

//Notes:
//jQuery Address is a plugin that offers URL rewriting, along with adding to the history of the browsr to enable the back button and enable 
// deeplinking with ajax content.

//livequery - is used for .click() events on elements that are not in the DOM at runtime and are created later using js. The thumbnails on ajax pages cannot be bound to a .click() event since they are not a part of the DOM at runtime.	
	
	
//	-----TOC--------
//  0.5 Global Variables
//	1.0 Instantiate - $(function() {}
//	2.0 create_
//	3.0 delete_
//	4.0 format_
//	5.0 get_
//	6.0 instantiate_
//	7.0 is_
//	8.0 listen_
//	9.0 submit_
//	10.0 update_
//	11.0 validate_
//  12.0 small plugins

//------------------------------------------------------------------/

//-----------------------------------------------------------------------------------
//0.5 Global Variables
//
//-----------------------------------------------------------------------------------
var thumbNailImageCounter = 0;
var firstRunSlider = true;
var been_done = 0; // not used.
var data_xml;
var bg_image_ticker = 0;
var thumb_position = 0;
var parentId = 0;
hidden = true;

function carousel_initCallback(carousel) {
    jQuery('.rotator_thumbs a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).attr("rel")));
    	return false;
	});
	
	jQuery('.pg_next a').bind('click', function() {
        carousel.next();
        return false;
    });

    jQuery('.pg_prev a').bind('click', function() {
        carousel.prev();
        return false;
    });

}
   					
function carousel_itemVisibleInCallbackAfterAnimation(carousel, item, idx, state) {
   	jQuery('.rotator_thumbs a').each(function(){
   		if (jQuery(this).attr("rel") == jQuery(item).attr("rel")){
   			jQuery(this).addClass("selected");
   		} else {
   			jQuery(this).removeClass("selected");
   		}
   	});
}

//-----------------------------------------------------------------------------------
//1.0 Instantiate - $(function() {}
// functions called once DOM is ready.
//-----------------------------------------------------------------------------------

$(function() {
//alphabetical order
//call the functions here - define the functions below
instantiate_address();
instantiate_global_date_picker();
instantiate_thumbnail_ajax_pages();	
listen_change_scenery();
listen_hide_page_content();
listen_pdf_download();

}); //end of document.ready

$(document).ready(function () {
	listen_expand_second_nav();	
})

//-----------------------------------------------------------------------------------
//2.0 create_
// 
//usually limited params
//returns html string or .append() straight out to the DOM
//-----------------------------------------------------------------------------------
function adjust_imageSlider(pagePosition){
//	thumb_position = pagePosition;
//	var pagePos = pagePosition - 1;
//	console.log("adjusting Images... " + pagePos);
//	var amountToMove = pagePos * 138; //138px is the size of the li's
//	$("ul.gallery li").each(function(){
//		var currentPos = $(this).css("left");
//		$(this).css("left", currentPos - amountToMove);
		
//	});
	
}

function create_pageContent(html, fromAjax, pagePosition){
//	$(".main_content_content h1").fadeOut().empty().append(html[0]).fadeIn();
	
	var downloadsHtml = "";
	var copy = '<h1>'+html[0]+'</h1>'+html[1]; //combine the h1 and the rest of the page content.
 	$(".main_content_content").empty().append(copy);
	$("#main_image img").attr("src", html[2]).hide();
	if (html[3] == ""){
		$("#main_image_caption").hide();
		$("#main_image_caption p").empty();
		$("#main_image_caption").css("background", "none");
	} else {
		$("#main_image_caption p").empty().append(html[3]);
		$("#main_image_caption").show();
		$("#main_image_caption").css("background", 'url("../images/big_pic-bg.png") repeat-x scroll 0 0 transparent');
	}
	$(".pdf_downloads_html_wrapper").empty();
	if (html[4] != ""){
		if (html[4][0] != ""){
			if (html[4][0][0] != ""){
	
				var pdf_downloads_html = '<div id="download_pdf_frame">';
				
				for (x in html[4]){
					pdf_downloads_html += '<div class="download_pdf">';
					pdf_downloads_html += '<p><a href="'+html[4][x][1]+'" target="_blank" class="pdf_download" rel="'+html[4][x][0]+'">'+html[4][x][0]+'<img src="/images/icon_pdf_download_arrow.png" /></a></p>';
					pdf_downloads_html += '</div><!-- .download_pdf -->';
					
				}
				pdf_downloads_html += '</div><!-- #download_pdf_frame -->';
			$(".pdf_downloads_html_wrapper").append(pdf_downloads_html);
		
			} // html[4][0][0]
		}// html[4][0]
	}//html[4]
	$("#main_image img").imagesLoaded(function(){	$(this).show(); });
		
			$('#main_content_frame, ul.gallery, #slideshow, #slideshow li a img, #slideshow li a, .pdf_downloads_html_wrapper, #main_image img, #main_image_caption, ul.pg_paging li').fadeIn(1100);
			$('a.fancy').fancybox(); 
	
	document.title = html[5];
	

}

function create_secondaryNav(html){
	$('ul.secondary_nav').append(html);
}

function create_thumbNails(html, pagePosition, fromAjax){
//console.log("createThumbs");
		if (fromAjax){
			$("#slideshow_frame2").append('<div id="slideshow"><ul class="gallery"></ul></div>');
		}
			$("ul.gallery").append(html);
			
			if (thumbNailImageCounter == 1){ //if there is only 1 thumbnail in a section, just hide the whole thing.
				$("#slideshow").hide();
			} else{
				$("#slideshow").show();
			}
	
			//with less than 5 images, the scroller doesn't really work properly.
			// We also check for firstRunSlider, because the plugin has some problems with unbinding and 
			// doesn't like to be initialized more than once.
			if(thumbNailImageCounter > 5 && firstRunSlider){
				var gallery = instantiate_gallery_thumbs(pagePosition);
			} else {
				$("ul.gallery").addClass("prettyGalleryContainer");	
			}
			//thumb_position = pagePosition;
			if (pagePosition > 5){ //we don't need to adjust it if the page is one of the first 5 images anyway
				//pageposition is NOT zero based. The first image is #1
				adjust_imageSlider(pagePosition);
			}
			if (thumbNailImageCounter == 1){
				$("#slideshow").hide();
			} else{
				$("#slideshow").show();
			}
		
			
}

//-----------------------------------------------------------------------------------
//3.0 delete_
//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------
//4.0 format_
//
//accepts parameter
//returns same variable formatted
//-----------------------------------------------------------------------------------



//-----------------------------------------------------------------------------------
//5.0 get_
//-----------------------------------------------------------------------------------

function get_hostname_from_url(url) {
     return url.split(/\/+/g)[1]; 
}

function get_idFromSlug(page_name, file_name, pageContent){
	var page_id = 0;
	var page_pos = 1;
	var sec_nav_id;
	var sec_nav_selected_id;
	var primarySection = 0;
	var page_info = new Array();
	
	// Since we were able to consolidate the copy into 1 xml file per section, this was rewritten so we don't have to keep making a call.
	// var pageContent = $.ajax({
	// 	url: '/xml/copydeck-'+file_name+'.xml',
	// 	async: false,
	// 	cache: true
	// });
	
	$(pageContent.responseXML).find('page').each(function() {
		if ($(this).find('slug').text() == page_name || "/" + $(this).find('slug').text() == page_name){
			page_id = $(this).attr("id");
			if (file_name = "hana"){
		    	primarySection = $(this).attr("primarySection");
			}
			page_pos = $(this).attr("position");
			sec_nav_id = $(this).attr("section")
			page_info = [page_id, page_pos, sec_nav_selected_id];
		}

	});
	$(pageContent.responseXML).find('page').each(function(){
		if (file_name != "hana"){
			if ($(this).attr('section') == sec_nav_id && $(this).attr('secondaryNav') == "true"){
			sec_nav_selected_id = $(this).attr("id");
			} 
		} else {
			if ($(this).attr('section') == sec_nav_id && $(this).attr('secondaryNav') == "true" && $(this).attr("primarySection") == primarySection){
			sec_nav_selected_id = $(this).attr("id");
			}
		}
		page_info = [page_id, page_pos, sec_nav_selected_id];
		
	});
	if (file_name == "hana"){
		show_correct_secondary_nav(primarySection);
	}
	return page_info;
}


function get_pageContent(id, pageName, pageContent){
	//console.log(id);
	var content = new Array();
	var pageTitle = "";
	var header = "";
	var copy = "";
	var mainImage = ""
	var imageCaption = "";
	var pdfDownload = new Array();
	var pdfDownloadCount = 0;
	var pdfDownloadData = new Array();
	var count = 0;
	
	// Since we were able to consolidate the copydeck into 1 xml file per section, this was rewritten so we don't have to keep making a call.
	// var pageContent = $.ajax({
	// 	url: '/xml/copydeck-'+pageName+'.xml',
	// 	async: false,
	// 	cache: true
	// });
	
	$(pageContent.responseXML).find('page[id="'+id+'"]').each(function() {
		pageTitle = $(this).find("pageTitle").text();
		header = $(this).find("h1").text();
		copy = $(this).find("copy").text();
		mainImage = "/" + $(this).find("mainImg").text();
		imageCaption = $(this).find("imageCaption").text();
		$(this).find("pdf").each(function(x){
			pdfDownloadData = new Array();
			
			pdfDownloadData[0] = $(this).find("title").text();
			pdfDownloadData[1] = $(this).find("url").text();
			
			pdfDownload[x] = pdfDownloadData;
			
			count++;
			
			
		});
		
	});

	
	//console.log(pdfDownload);
	content = [header, copy, mainImage, imageCaption, pdfDownload, pageTitle];
	return content;
}

function get_secondaryNav(section, secondaryNav){
	if (section === undefined){
		sectionId = 0;
	}
	var experiences = $('body.experiences').size();
	var austin = $('body.austin').size();
	var hana = $('body.hana').size();
	var pageUrl = "";
	
	if (experiences){
		pageUrl = "experiences";
	} 
	if (austin) {
		pageUrl = "austin";
	}
	if (hana) {
		pageUrl = "hana";
	}
	
	// Since we were able to consolidate the copy into 1 xml file per section, this was rewritten so we don't have to keep making a call.
	// var secondaryNav = $.ajax({
	// 	url: '/xml/copydeck-'+pageName+'.xml',
	// 	async: false,
	// 	cache: true
	// });
	
	var html = "";
	var selected = '';

	$(secondaryNav.responseXML).find("page").each(function() {
		if ($(this).attr("secondaryNav") == "true"){
			var title = $(this).find("title").text();
			var count = $(this).attr("section");
			if (count == sectionId){
				selected = 'class="selected"';
				pageId = $(this).attr("id");
			} else {
				selected = '';
			}
			if (count == 0){
			html += '<li class="top"><a href="'+pageUrl+'.php?sectionId='+count+'" id="'+count+'" '+selected+'>'+title+'<img src="/images/nav/icon_selected-arrow.png" /></a></li>' 	
			} else {
		 	html += '<li><a href="'+pageUrl+'.php?sectionId='+count+'" id="'+count+'" '+selected+'>'+title+'<img src="/images/nav/icon_selected-arrow.png" /></a></li>'
			}
		}
		count++;
	});
	return html;
}

function get_thumbNails(id, pageName, galleryThumbs){
	if (id === undefined){
		pageId = 0;
	} else {
		pageId = id;
	}
	
	// Since we were able to consolidate the copy into 1 xml file per section, this was rewritten so we don't have to keep making a call.
	// var galleryThumbs = $.ajax({
	// 	url: '/xml/copydeck-'+pageName+'.xml',
	// 	async: false,
	// 	cache: true
	// });	

	var html = "";
	var count = 0;
	var selected = '';
	var title = "";
	var experiences = $('body.experiences').size();
	var austin = $('body.austin').size();
	var hana = $('body.hana').size();
	var pageUrl = "";
	
	if (experiences){
		pageUrl = "/experiences";
	} 
	if (austin) {
		pageUrl = "/austin";
	}
	if (hana) {
		pageUrl = "/hana";
	}
	var section = $(galleryThumbs.responseXML).find('page[id="'+pageId+'"]').attr("section");
	if (hana){
		var primarySection = $(galleryThumbs.responseXML).find('page[id="'+pageId+'"]').attr("primarySection");
	}
		$(galleryThumbs.responseXML).find('page[section="'+section+'"]').each(function(n) {
		  if(!hana){
			if($(this).attr("position") != 0){ //setting position=0 in the XML will hide the thumbnail. but not the content.
				var pageIdx = $(this).attr("id");
				var pageSlug = $(this).find("slug").text();
				var imgSrc = "/" + $(this).find("thumbImg").text();
				var pageTitle = $(this).find("h1").text();
				var imageCaption = $(this).find("thumbCaption").text();
				if (pageIdx == id){
					selected = 'selected';
				} else {
					selected = '';
				}
				html += '<li id="position_'+n+'"><a rel="/'+pageSlug+'" href="'+pageUrl+'/'+pageSlug+'" id="'+pageIdx+'" title="'+pageTitle+'" class="thumbnails '+selected+'">';
				html+= '<img src="'+imgSrc+'" width="121" height="84" alt="'+pageTitle+'" /></a>';
				html+= '<span>'+imageCaption+'</span></li>';
				count++;
			}
		  } else {// Hana page?
			  if($(this).attr("primarySection") == primarySection){//only get thumbs for the same Primary Section
		  		if($(this).attr("position") != 0){ //setting position=0 in the XML will hide the thumbnail. but not the content.
					var pageIdx = $(this).attr("id");
					var pageSlug = $(this).find("slug").text();
					var imgSrc = "/" + $(this).find("thumbImg").text();
					var pageTitle = $(this).find("h1").text();
					var imageCaption = $(this).find("thumbCaption").text();
					if (pageIdx == id){
						selected = 'selected';
					} else {
						selected = '';
					}
					html += '<li id="position_'+n+'"><a rel="/'+pageSlug+'" href="'+pageUrl+'/'+pageSlug+'" id="'+pageIdx+'" title="'+pageTitle+'" class="thumbnails '+selected+'">';
					html+= '<img src="'+imgSrc+'" width="121" height="84" alt="'+pageTitle+'" /></a>';
					html+= '<span>'+imageCaption+'</span></li>';
					count++;
				} // end position not 0 if
			  }//end Primary Section if
		  }
		});
		
	thumbNailImageCounter = count;
	
	return html;
}

//The consolidated XML call.
function get_xml_data(file_name){
	//copy decks are named:
	//copydeck-experiences.xml and copydeck-austin.xml
	if (!data_xml){
		data_xml = $.ajax({
			url: '/xml/copydeck-'+file_name+'.xml',
			async: false,
			cache: true
		});
	}
	return data_xml;
}

//-----------------------------------------------------------------------------------
//6.0 instantiate_
// 
// functions called from above document.ready that RUN when the DOM is ready.
//-----------------------------------------------------------------------------------


function instantiate_address(){
	var init = $(".experiences").size();
	var init2 = $(".austin").size();
	var init3 = $(".hana").size();
	
	var split_path;

			
	if (init || init2 || init3){		

		 $.address.init(function(event) {	
		 	
		 	//console.log("init");	
		 	//if (event.path != "/undefined"){
	         $('a.thumbnails, ul.secondary_nav a, a.address_ajax').livequery(function() {
					$(this).address(function() {
							var dmn = "http://" + get_hostname_from_url(location.href) + "/";
							var addrs = $(this).attr('href').replace(location.pathname, '/').replace(dmn, '/');
					
								
	             			return addrs;
             			//}
	         		});
				});
			//}
	     }).change(function(event) {
		//	listen_change_event_for_address(event);
			
     
	     }).internalChange(function(event) {
	     	//console.log("intenalChange");
	     	
	     		listen_change_event_for_address(event, true);
	     }).bind('externalChange', {msg: 'The value of the event is "{value}".'}, function(event) {
			//console.log("externalChange");
			//console.log("event path = " + event.path);
			if (event.path == "" && init3){
				listen_change_event_for_address(event, true, true);
			}
			if (event.path != "/undefined"){
				listen_change_event_for_address(event, true);
			}
			
	     });
	}//end init
}




function instantiate_gallery_thumbs(pagePosition){		
		$('ul.gallery').livequery(function() {
//				$(this).jcarousel({
//        					scroll: 5,
//        					auto: 0,
//        					visible: 5,
//        					animation: 0,
//        					start: pagePosition,
//        					//itemFirstInCallback: carousel_itemFirstInCallback,
//        					initCallback: carousel_initCallback,
//        					itemVisibleInCallback: {
//            					onBeforeAnimation: carousel_itemVisibleInCallbackAfterAnimation
//            					//onAfterAnimation:  carousel_itemVisibleInCallbackAfterAnimation
//        					},
//	    	    			buttonNextHTML: '<div ><a class="pg_next" title="Next page" href="#">Next</a></div>',
//    	    				buttonPrevHTML: '<div ><a class="pg_prev" title="Previous page" href="#">Previous</a></div>'
//    					});

			$(this).prettyGallery({
					itemsPerPage : 5,
					animationSpeed : 'normal', /* fast/normal/slow */
					navigation : 'top',  /* top/bottom/both */
					of_label: ' of ', /* The content in the page "1 of 2" */
					previous_title_label: 'Previous page', /* The title of the previous link */
					next_title_label: 'Next page', /* The title of the next link */
					previous_label: 'Previous', /* The content of the previous link */
					next_label: 'Next', /* The content of the next link */
					start_slide: parseInt(pagePosition)
			});
			firstRunSlider = false;
		});
	
		return this;
}

function instantiate_global_date_picker(){
	var arrival_date = "";
	$("#input_arrival_date").datepicker({
		//minDate is the earliest possible date. So we set it to be at least tomorrow.
			minDate: +0,
			//	changeYear: true
			onClose: function(dateText, inst) {
				arrival_date = dateText;

				if (dateText != ""){
					var arrival_array = arrival_date.split("/", 3);
									// var arrival_month = parseInt(arrival_array[0],10);
									// var arrival_day = parseInt(arrival_array[1],10);
									// var arrival_year = parseInt(arrival_array[2]);
					
					
					//After a date has been chosen in the Arrival field, we can update the minDate in the departure field to be at least
					//1 day AFTER the arrival date. 
					$("#input_departure_date").datepicker( "option", "minDate", new Date(parseInt(arrival_array[2]), parseInt(arrival_array[0],10) -1, parseInt(arrival_array[1],10)+1));
					}
			}
	});
	
	//This is the init of the departure date. See above where it gets set properly after the arrival date has been picked.
	//All this is currently doing is making sure that you can't pick a departure date that happens before tomorrow.
	$("#input_departure_date").datepicker({
			minDate: +1
	});
	
//instantiate the listener for the GO (Submit) button.
	listen_date_picker_go();
 
}


function instantiate_thumbnail_ajax_pages(){
	//console.log("instantiate_thumbnail_ajax_pages");
	var pageId = 0;
	var pageInfo;
	var data_feed;
	if(been_done == 0){
		var experiences = $('body.experiences').size();
		var austin = $('body.austin').size();
		if (experiences){
			data_feed = get_xml_data("experiences");
			pageInfo = get_idFromSlug(page_slug, "experiences", data_feed);
			
			pageId = pageInfo[0];
		}
		if (austin){
			data_feed = get_xml_data("austin");
			pageInfo = get_idFromSlug(page_slug, "austin", data_feed);
			pageId = pageInfo[0];
		
		}
		if(experiences && firstRunSlider){
			thumbNailsHtml = get_thumbNails(pageId, 'experiences', data_feed);

			create_thumbNails(thumbNailsHtml, pageInfo[1], false);
		//	listen_ajaxify_pageLinks();
		}
		if(austin && firstRunSlider){
			thumbNailsHtml = get_thumbNails(pageId, 'austin', data_feed);
			create_thumbNails(thumbNailsHtml, pageInfo[1], false);
		//	listen_ajaxify_pageLinks();
		}
	}

}

//-----------------------------------------------------------------------------------
//7.0 is_
// 
// accepts paramater(s) to test
// returns bool
//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------
//8.0 listen_
// 
// functions called from above document.ready that wait.
// These are for .click() and .hover() functions--excluding form submit buttons
//-----------------------------------------------------------------------------------


function listen_navigatePage(){
	//analytics
//	_gaq.push(['_trackPageview']);
// this is already installed in jquery address.
}

function listen_ajaxify_pageLinks(){
	//-----------
	// This entire function has been commented since jQuery Address will handle it now 
	//-----------
	
	// $('.secondary_nav a').livequery('click' , function(){
	// 	$(".secondary_nav li a").removeClass("selected");
	// 	$(this).addClass("selected");
	// 	
	// 	//the ID of the a tag is the landing page for that section
	// 	var page_id = $(this).attr("id");
	// 	var experiences = $('body.experiences').size();
	// 	var austin = $('body.austin').size();
	// 	
	// 	
	// 	if(experiences){
	// 		thumbNailsHtml = get_thumbNails(page_id, 'experiences');
	// 		pageContent = get_pageContent(page_id, 'experiences');
	// 	}
	// 	if(austin){
	// 		thumbNailsHtml = get_thumbNails(page_id, 'austin');
	// 		pageContent = get_pageContent(page_id, 'austin');
	// 	}
	// 	
	// 	
	// 	
	// 	$('ul.gallery').unbind();
	// 	$('#main_content_frame, .pdf_downloads_html_wrapper').fadeOut(1000, function(){
	// 
	// 	
	// 		$("#slideshow").remove();
	// 		create_pageContent(pageContent, "true");
	// 		create_thumbNails(thumbNailsHtml, true);
	// 	});
	// 	
	// 	return false;
	// });
	// 
	// $('#slideshow a.thumbnails').livequery('click' , function(){
	// 	var page_id = $(this).attr("id");
	// 		var experiences = $('body.experiences').size();
	// 		var austin = $('body.austin').size();
	// 		if(experiences){
	// 			pageContent = get_pageContent(page_id, 'experiences');
	// 		}
	// 		if(austin){
	// 			pageContent = get_pageContent(page_id, 'austin');
	// 		}
	// 	
	// 	$("#slideshow li a").removeClass("selected");
	// 	$(this).addClass("selected");
	// 	$('#main_content_frame, .pdf_downloads_html_wrapper').fadeOut(1000, function(){
	// 		create_pageContent(pageContent, "click");
	// 	});
	// 	
	// 	return false;
	// });
}

function listen_change_event_for_address(event, fromAjax, hanaPage){
	//console.log("listen_change_event_for_address");
	var experiences = $('body.experiences').size();
	var austin = $('body.austin').size();
	var hana = $('body.hana').size();
	//console.log("event.value = " + event.value);
	var parentId = 0;
	var page_name = event.value;
	if (page_name == "/undefined"){
				page_name = "";
			}
	if (page_name == "" && hanaPage){
		page_name = "travaasa-hana-overview";
		$('#main_content_frame, ul.gallery, #slideshow, #slideshow li a img, #slideshow li a, .pdf_downloads_html_wrapper, #main_image img, #main_image_caption, ul.pg_paging li').hide();
	}
	if (page_name != "" ){
	//	var fromAjax = true;
		
	
			
		var page_id = 0;
		var data_feed;
		var pageInfo;
		if (experiences){
			data_feed = get_xml_data("experiences");
			
			pageInfo = get_idFromSlug(page_name, 'experiences', data_feed);
			page_id = pageInfo[0]
			
		}
		if (austin){
			data_feed = get_xml_data("austin");
			
			pageInfo = get_idFromSlug(page_name, 'austin', data_feed);
			page_id = pageInfo[0];
			
		}
		if (hana){
			data_feed = get_xml_data("hana");
			
			pageInfo = get_idFromSlug(page_name, 'hana', data_feed);
			page_id = pageInfo[0]
			
		}
		$(".secondary_nav li a").removeClass("selected");
		$("ul.secondary_nav a").each(function(){
			if ($(this).attr("id") == pageInfo[2]){  //find the right sec nav 
				$(this).addClass("selected");
				if($(this).parent().hasClass("childOfOne") || $(this).parent().hasClass("parentOfOne")){
					$(".secondary_nav li.parentOfOne a").addClass("selected");
					
					
					
					$("ul.secondary_nav .childOfOne a").each(function(){
						
						$(this).slideDown("slow");
					});
					
					$("ul.secondary_nav li.parentOfOne a").children().attr("src", "/images/nav/icon_selected-arrow_down.png");
				} else {
					$("ul.secondary_nav .childOfOne a").each(function(){
						
						$(this).slideUp("slow");
					});
				} 
			}
		});
	
		
		if(experiences){
			thumbNailsHtml = get_thumbNails(page_id, 'experiences', data_feed);
			pageContent = get_pageContent(page_id, 'experiences', data_feed);
		}
		if(austin){
			thumbNailsHtml = get_thumbNails(page_id, 'austin', data_feed);
			pageContent = get_pageContent(page_id, 'austin', data_feed);
		}
		if(hana){
			thumbNailsHtml = get_thumbNails(page_id, 'hana', data_feed);
			pageContent = get_pageContent(page_id, 'hana', data_feed);
		}
		
	
		
	
	
		$('ul.gallery').unbind();
		//just before we fade out, we set the min-height on the full wrapper so that we don't get the footer bouncing up to the top for a second.
		//var page_height = $("#content_960").height();
		//$("#content_960").css("min-height", page_height + "px");
		$('#main_content_frame, ul.gallery, #slideshow, #slideshow li a img, #slideshow li a, .pdf_downloads_html_wrapper, #main_image img, #main_image_caption, ul.pg_paging li').fadeOut(1000);
		
		//this is better than using the callback for multiple items fading out.
		var wait = setInterval(function() {
        if (!$("#main_content_frame, ul.gallery, #slideshow, #slideshow li a img, #slideshow li a, .pdf_downloads_html_wrapper, #main_image img, #main_image_caption, ul.pg_paging li").is(":animated")) {
            clearInterval(wait);
            $("#slideshow_frame2").empty();
			
			create_pageContent(pageContent, "from_address", pageInfo[1]);
			
			create_thumbNails(thumbNailsHtml, pageInfo[1], fromAjax);
        }
    }, 200);
		var pagePosition = pageInfo[1];
		thumb_position = pagePosition;
		//console.log("pagePosition: "+pagePosition);
		
	}
}

function listen_change_scenery(){
	var footerArrayIndex = 0;
	var bodyId = $("body").attr("class");
	
	if ($.cookie(bodyId)){
		footerArrayIndex = $.cookie(bodyId);
	}
	//on the init put the content into the background description, and the image src
	//console.log(footerArrayIndex);
	$("#footer_bg_description").empty().append(bg_caption[footerArrayIndex]);
	$("#background").css("background-image", "url(/" + bg_image[footerArrayIndex] + ")");	
	
	function fadeComplete(){
		//this was moved into the setInterval function below.
		return true;
	}
	
	
	$('#change_scenery').click(function(){
		//var contentHeight = $("#background").height();
		//$("#background").css("height", contentHeight + "px");
		
		
		
		if (footerArrayIndex < (bg_image.length-1)){
			footerArrayIndex++;
		} else{
			footerArrayIndex = 0;
		}
		
		$.cookie(bodyId, footerArrayIndex);
		
		//$('#background, #footer_bg_description').fadeOut(2000, fadeComplete);
		$('#background').fadeOut(2000, fadeComplete);
		
		var wait = setInterval(function() {
        if (!$("#background, #footer_bg_description").is(":animated")) {
            clearInterval(wait);
            $("#background").css("background-image", "" ).css("background-image", "url(/"+bg_image[footerArrayIndex]+")" );
			$("#footer_bg_description").empty().append(bg_caption[footerArrayIndex]);
			$('#background').fadeIn(1600);
        }
    }, 200);
		//$('#background').fadeIn(1600);
		
			return false;
	});
}

function listen_date_picker_go(){
	$("#arrival_date_icon").click(function(){
		$("#input_arrival_date").focus();
	});
	$("#departure_date_icon").click(function(){
		$("#input_departure_date").focus();
	});
	var error_message = "";
	re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/; //regex for date
	
	$("#btn_submitReservation").click(function(){
		var error_count = 0;
		
		
		//get all the form data
		var location = $('[name=location]').val();
		var arrival_date = $('[name=arrival_date]').val();
		var departure_date = $('[name=departure_date]').val();
		$("#reservation_cta label").removeClass("reservation_error");
		
		if (location == 0){
			$("#reservation_cta label#lbl_location").addClass("reservation_error");
			error_count++;
		}
		if (arrival_date == "" || !arrival_date.match(re)){
			$("#reservation_cta label#lbl_arrival_date").addClass("reservation_error");
			error_count++;
		}
	
		
		if (departure_date == "" || !departure_date.match(re)){
			$("#reservation_cta label#lbl_departure_date").addClass("reservation_error");
			error_count++;
		}
		
		if (error_count == 0){ //make sure that everything is at least filled out.
			_gaq.push(['_trackEvent', 'Reservation', location, arrival_date]); //Tracking
		
			//var url = "https://www.phgsecure.com/IBE/bookingRedirect.ashx?propertyCode="+location+"&arrivalDate="+arrival_date+"&departureDate="+departure_date;
			//window.open(url);
			
			
			
			if (location == "AUSTC"){ //austin
				var urlAustin = "https://gc.synxis.com/rez.aspx?Hotel=28064&Chain=10237&template=AUSTC&shell=AUSTC4&arrive="+arrival_date+"&depart="+departure_date;
				window.open(urlAustin);
			}
			
			if (location == "HNMHM"){ //hana
				var urlHana = "https://gc.synxis.com/rez.aspx?Hotel=26987&Chain=10237&shell=HNMHM2&arrive="+arrival_date+"&depart="+departure_date;
				window.open(urlHana);	
			}
			
			$('[name=location]').val('').removeAttr("selected");
			var select = $('[name=location]');
			$('[name=location]').val(jQuery('option:first', select).val());
			$('[name=arrival_date]').val('');
			$('[name=departure_date]').val('');
		} else {
			error_message = "Please ensure that all fields are filled out."
		}
		return false;
	});
}

function listen_expand_second_nav(){
	//console.log("listen_expand_second_nav");

	var austin = $('body.austin').size();
	var hana = $('body.hana').size();
	if (austin || hana){
		
		$("ul.secondary_nav a").click(function(){
			if ($(this).parent().hasClass("parentOfOne") || $(this).parent().hasClass("childOfOne") ){
					
					$("ul.secondary_nav .childOfOne a").each(function(){
						$(this).slideDown("slow");
					});
					
					if ($(this).parent().hasClass("parentOfOne")){
						$(this).children().attr("src", "/images/nav/icon_selected-arrow_down.png");
					} else {
						$(this).children().attr("src", "/images/nav/icon_selected-arrow.png");
					}
			} else {
					$("ul.secondary_nav .childOfOne a").each(function(){
						$(this).slideUp("slow");
					});	
					
					$(this).children().attr("src", "/images/nav/icon_selected-arrow.png")
			}
		});
	} //if austin	
}



		
				
			
			
			
function listen_hide_page_content(){
	$("a.hide_content").click(function(){
		//$('#content_960, .hide_content_button_container').css({opacity: 1, visibility: "visible"}).animate({opacity: 0},3000);
		//var contentHeight = $("#page_content").height();
		$("#page_content").css("height", "600px");
                
		$('#content_960, #main_content, #p_slideshow img, #p_slideshow span, #p_slideshow a, #p_slideshow ul li a, ul.secondary_nav li a, #main_content_frame, ul.gallery, #slideshow, #slideshow li a img, #slideshow li a, .pdf_downloads_html_wrapper, #main_image img, #main_image_caption, ul.pg_paging li, .contact_us_form_container, .right_610_box, .box_610_content_top, .box_610_content, .box_610_content img, .box_610_content_bottom, .submit_contact_form').fadeToggle("slow", function(){
                    $('.bgfix').bgfixUpdate();
                    if(hidden==true){
                        hidden=false;
                        $('.hide_content_button_container img').attr('src', '/images/btn_show_content.png');
                    }
                    else {
                        hidden=true;
                        $('.hide_content_button_container img').attr('src', '/images/btn_hide_content.png');
                    }
                });//(1000, 0, function () {$('.bgfix').bgfixUpdate();});
		$("#footer_frame").css("position", "fixed");
		
		return false;
	});
	
}

function listen_pdf_download(){
	var init = $("body.experiences").size();
	var init2 = $("body.austin").size();
	var init3 = $("body.hana").size();
	if (init || init2 || init3){
		$('.pdf_download').livequery("click", function(){
			var title = $(this).attr("rel");
			_gaq.push(['_trackEvent', 'PDF', "download", title]); // tracking
		});
	}
}




//-----------------------------------------------------------------------------------
//9.0 submit_
// 
// functions that submit forms based on a button .click()
//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------
//10.0 update_
//-----------------------------------------------------------------------------------

function show_correct_secondary_nav(primarySection){
 if($("body.hana").size()){
	$("ul.secondary_nav").each(function(){
		if ($(this).hasClass("primarySection"+primarySection)){
			$(this).fadeIn("600");
			
		} else{
			//$(this).hide();
		}
	});
  }
}

//-----------------------------------------------------------------------------------
//11.0 validate_
//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------
//12.0 small plugins
//-----------------------------------------------------------------------------------

$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}

// $('img.photo',this).imagesLoaded(myFunction)
// execute a callback when all images have loaded.
// needed because .load() doesn't work on cached images

// mit license. paul irish. 2010.
// webkit fix from Oren Solomianik. thx!

// callback function is passed the last image to load
// as an argument, and the collection as `this`


$.fn.imagesLoaded = function(callback){
  var elems = this.filter('img'),
      len = elems.length;
      
  elems.bind('load',function(){
      if (--len <= 0){ callback.call(elems,this); }
  }).each(function(){
     // cached images don't fire load sometimes, so we reset src.
     if (this.complete || this.complete === undefined){
        var src = this.src;
        // webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
        // data uri bypasses webkit log warning (thx doug jones)
        this.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
        this.src = src;
     }
  });

  return this;
};
