/****** jQuery Cookie http://www.quirksmode.org/js/cookies.html *****/

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}
/****** END jQuery Cookie *****/



/****** STYLESWITCHER *****/
jQuery(document).ready(function() {    
        
        /* toggle styleswitcher*/
        jQuery(document).ready(function() {
    		var ssclass = readCookie('ss_class');
    		if (ssclass == "false") {
     		jQuery("#ss_open").addClass("ss_close");
    		}
  	});
        
        jQuery(function() {		
		jQuery( "#styleswitcher_btn" ).click(function() {
			var ssclass = jQuery('#ss_open').hasClass('ss_close');
                        createCookie('ss_class',ssclass, 1);
                        jQuery( "#ss_open" ).toggleClass( "ss_close", 500 );
			return false;                         
		});
                
	});

                jQuery("#skins").change(function() {
                        var skin_css = jQuery(this).val();
                        var templateDir = "<?php bloginfo('template_directory') ?>";
                        jQuery('.s_switch').remove();
                        jQuery('head').append("<link rel='stylesheet' href='http://www.themes.red-sun-design.com/lemonchili/wp-content/themes/lemonchili/css/skins/"+skin_css+".css' class='s_switch' type='text/css' media='screen' /> ");  
                        //jQuery('head').append("<link rel='stylesheet' href='../wordpress2/wp-content/themes/lemonchili/css/skins/"+skin_css+".css' class='s_switch' type='text/css' media='screen' /> "); 		
                        //jQuery("#logoimage").attr("src", "http://www.themes.red-sun-design.com/lemonchili/wp-content/themes/lemonchili/images/logo/"+skin_css+".png");                        
                        jQuery(".logoimage").attr("src", "http://www.themes.red-sun-design.com/lemonchili/wp-content/plugins/styleswitch/logo/"+skin_css+".png");                        
                        //jQuery("#logoimage").attr("src", "../wordpress2/wp-content/themes/lemonchili/images/logo/"+skin_css+".png");
                        return false; 
                });

	  	jQuery("#fonts").change(function() {
                        
                        //text transform
                        if (jQuery(this).find(':selected').val() == 'Cherry Swash' || jQuery(this).find(':selected').val() == 'Croissant One' || jQuery(this).find(':selected').val() == 'Love Ya Like A Sister') {
                                jQuery('.nivo-caption, #content h3.widgettitle, h3.menu-cat, h1.pagetitle, h1.title, h1.event-title, h1.event-title-w, h1.menu-cat, .sf-menu a, .sf-menu li li a, h6.hours-title, .event-date, h6.menu-title, h6.menu-title2, .date-h, li.comment cite, ul.login li a, .moretext, #search-button, h1.team-title, h6.trigger, .gallery-title, .reply, #submit, h3#reply-title').css('text-transform','none');
                        }

                        if (jQuery(this).find(':selected').val() == 'Montserrat' || jQuery(this).find(':selected').val() == 'Open Sans' || jQuery(this).find(':selected').val() == 'Open Sans Condensed' ||  jQuery(this).find(':selected').val() == 'Patua One' || jQuery(this).find(':selected').val() == 'Anonymous Pro' || jQuery(this).find(':selected').val() == 'Rancho' || jQuery(this).find(':selected').val() == 'Patrick Hand' || jQuery(this).find(':selected').val() == 'Bree Serif' || jQuery(this).find(':selected').val() == 'Ruda' || jQuery(this).find(':selected').val() == 'Dosis' || jQuery(this).find(':selected').val() == 'Ubuntu Mono' ) {
                                jQuery('.nivo-caption, #content h3.widgettitle, h3.menu-cat, h1.pagetitle, h1.title, h1.event-title, h1.event-title-w, h1.menu-cat, .sf-menu a, .sf-menu li li a, h6.hours-title, .event-date, h6.menu-title, h6.menu-title2, .date-h, li.comment cite, ul.login li a, .moretext, #search-button, h1.team-title, h6.trigger, .gallery-title, .reply, #submit, h3#reply-title').css('text-transform','uppercase');
                        }

                        //letter-spacing
                        if (jQuery(this).find(':selected').val() == 'Rancho' || jQuery(this).find(':selected').val() == 'Ruda' || jQuery(this).find(':selected').val() == 'Open Sans Condensed' || jQuery(this).find(':selected').val() == 'Patrick Hand' || jQuery(this).find(':selected').val() == 'Love Ya Like A Sister'  || jQuery(this).find(':selected').val() == 'Patua One' || jQuery(this).find(':selected').val() == 'Dosis'  ) {
                                jQuery('#content h3.widgettitle, h1.menu-cat, h1.pagetitle').css('letter-spacing','0');
                        }
                        
                        if (jQuery(this).find(':selected').val() == 'Croissant One'  ) {
                                jQuery('#content h3.widgettitle, h1.menu-cat, h1.pagetitle').css('letter-spacing','-2px');
                        }                        

                        if (jQuery(this).find(':selected').val() == 'Open Sans' || jQuery(this).find(':selected').val() == 'Montserrat' || jQuery(this).find(':selected').val() == 'Anonymous Pro' || jQuery(this).find(':selected').val() == 'Cherry Swash'  || jQuery(this).find(':selected').val() == 'Bree Serif'  || jQuery(this).find(':selected').val() == 'Ubuntu Mono' ) {
                                jQuery('#content h3.widgettitle, h1.menu-cat, h1.pagetitle').css('letter-spacing','-1px');
                        }

                        //font-weight
                        if (jQuery(this).find(':selected').val() == 'Patua One' || jQuery(this).find(':selected').val() == 'Croissant One' || jQuery(this).find(':selected').val() == 'Love Ya Like A Sister' || jQuery(this).find(':selected').val() == 'Cherry Swash' ||  jQuery(this).find(':selected').val() == 'Ubuntu Mono' || jQuery(this).find(':selected').val() == 'Anonymous Pro' || jQuery(this).find(':selected').val() == 'Patrick Hand' ||  jQuery(this).find(':selected').val() == 'Dosis' || jQuery(this).find(':selected').val() == 'Bree Serif' || jQuery(this).find(':selected').val() == 'Rancho' ) {
                                jQuery('.nivo-caption, .sf-menu a, .sf-menu li li a, h6.hours-title, h6.trigger, #content h3.widgettitle,  h1.gallery-title, .buttonS, .events1col h4.eventsmonth, .nivo-caption p, .price, .price2, h3.menu-cat, h1.pagetitle, h1.title, h1.event-title, h1.event-title-w, h1.menu-cat, .event-date, h6.menu-title, h6.menu-title2, .date-h, li.comment cite, ul.login li a, .moretext, #search-button, h1.team-title, .reply, #submit').css('font-weight','400');
                        }                        

                        if (jQuery(this).find(':selected').val() == 'Montserrat' || jQuery(this).find(':selected').val() == 'Open Sans' || jQuery(this).find(':selected').val() == 'Open Sans Condensed' || jQuery(this).find(':selected').val() == 'Ruda' ) {
                                jQuery('.nivo-caption, .sf-menu a, .sf-menu li li a, h6.hours-title, h6.trigger, #content h3.widgettitle, h1.gallery-title, .buttonS, .events1col h4.eventsmonth, .nivo-caption p, .price, .price2, h3.menu-cat, h1.pagetitle, h1.title, h1.event-title, h1.event-title-w, h1.menu-cat, .event-date, h6.menu-title, h6.menu-title2, .date-h, li.comment cite, ul.login li a, .moretext, #search-button, h1.team-title, .reply, #submit').css('font-weight','800');
                        }                          
                        
                        //slider caption padding
                        if (jQuery(this).find(':selected').val() == 'Ubuntu Mono' || jQuery(this).find(':selected').val() == 'Anonymous Pro'  ) {
                                jQuery('.nivo-caption p').css('padding','5px 0');
                        }
                        
                        if (jQuery(this).find(':selected').val() == 'Open Sans' || jQuery(this).find(':selected').val() == 'Open Sans Condensed' || jQuery(this).find(':selected').val() == 'Montserrat' || jQuery(this).find(':selected').val() == 'Dosis' || jQuery(this).find(':selected').val() == 'Patua One' || jQuery(this).find(':selected').val() == 'Love Ya Like A Sister' || jQuery(this).find(':selected').val() == 'Cherry Swash' || jQuery(this).find(':selected').val() == 'Patrick Hand' || jQuery(this).find(':selected').val() == 'Bree Serif' || jQuery(this).find(':selected').val() == 'Ruda' || jQuery(this).find(':selected').val() == 'Rancho'    ) {
                                jQuery('.nivo-caption p').css('padding','1px 0');
                        }
                        
                        var fontValue = jQuery(this).val();
	                jQuery('.recl').remove();                       
	                jQuery('head').append("<link href='http://fonts.googleapis.com/css?family="+fontValue+":400,600,700,800' rel='stylesheet' class='recl' type='text/css'>");
	    		jQuery('h1, h2, h3, h4, h5, h6, .button1, .buttonS, .moretext,  ul.tabs li a, .event-date, .price, .price2, span.reply, .details, .dropcap, li.comment cite, ul.login li a, .sf-menu a, .sf-menu li li a, .nivo-caption').css('font-family', fontValue + ',"Open Sans", Helvetica, Arial, sans-serif');                
                        return false;
                });
                
                               
                
  	jQuery(".color").click(function() {
    		var colorValue = jQuery(this).css('background-color');
                var shadow = '10px 0 0 ' + colorValue + ', -10px 0 0 ' + colorValue;
                                
                // color
                jQuery('.event-info a, .entry a, .single-right a, .contact a, #comments a, #content .widget a, #sidebar a, .post-info-h a, .postinfo a, .event-more-info a').css('color',colorValue);	
                                
                
                // remove color
                jQuery(' .reply a, h1.news-widget-title a, h1.title a, h1.event-title-w a, h6.menu-title a, .postinfo a, .tags a').css('color','');
                
                // color grey
                jQuery('.entry a, .single_entry a, #content .widget a, #sidebar a, .post-info-h a, .postinfo a').hover(function () {
		    jQuery(this).css('color','#B07D5B');
		  }, function () {
		    var cssObj = { 'color' : colorValue}
		    jQuery(this).css(cssObj);
		  });      
    		
    		// background color
                jQuery('.button1, .buttonS, .moretext, .gallery-resize-icon, ul.tabs li a, .pagination_main .current, .span.page-numbers, li.comment .reply, #submit, .login-submit input, .highlight1, .highlight2, .nivo-caption p').css('background-color',colorValue); 

                // remove background-color
                jQuery('ul.tabs li.ui-tabs-selected a').css('background-color','');
                

                // box shadow
                //alert("The box shadow varible is " + shadow);
                jQuery('.nivo-caption p').css('box-shadow', shadow); 

                // background color on hover
                jQuery('.pagination_main a, .nivo-directionNav a').hover(function () {
		    jQuery(this).css('background-color',colorValue);
		  }, function () {
		    var cssObj = { 'background-color' : '' }
		    jQuery(this).css(cssObj);
		  });
                
                // grey background color on hover
                jQuery('.button1, .buttonS, .moretext, li.comment .reply').hover(function () {
		    jQuery(this).css('background-color','#B07D5B');
		  }, function () {
		    var cssObj = { 'background-color' : colorValue}
		    jQuery(this).css(cssObj);
		  });
             
             
                // color on hover
		  jQuery('h1 a, h2 a, h3 a, h4 a , h5 a, h6 a, .sf-menu li li a, .tags a, .postinfo a, #footer-widget-area a, #footer-widget-area a').hover(function () {
		    jQuery(this).css('color',colorValue);
		  }, function () {
		    var cssObj = { 'color' : ''}
		    jQuery(this).css(cssObj);
		  });


		  jQuery('li.not-current-menu-item a, li.not-current-menu-item, .pagination_main a, ul.login li a, a.page-numbers, a.nivo-nextNav, a.nivo-prevNav').hover(function () {
		    jQuery(this).css('color',colorValue);
		  }, function () {
		    var cssObj = { 'color' : ''}
		    jQuery(this).css(cssObj);
		  });
             

    		return false;  
  	});
	
});