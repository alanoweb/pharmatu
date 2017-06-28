jQuery(window).load(function(){
        
        /** Masonry Floating Boxes*********************************************/
        
        /*global Modernizr */
        'use strict';
        
	var jQuerycontainer = jQuery('.m-container').masonry();
	// initialize Masonry after all images have loaded  
	jQuerycontainer.imagesLoaded( function() {
	  	jQuerycontainer.masonry();
	});

        /** top value if logged in ********************************************/
        var wpadmin = jQuery('#wpadminbar').height();
        //alert(wpadmin);		
        jQuery('#top-bar').css('top', wpadmin);
        jQuery('#left').css('top', wpadmin + 56);

});



jQuery(document).ready(function() {
	
	/** Slider ************************************************************/
        jQuery('#slider').nivoSlider({
                effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
                randomStart: false, // Start on a random slide
                animSpeed: 500, // Slide transition speed
                pauseTime: 7000, // How long each slide will show
                directionNav: true, // Next & Prev navigation
                directionNavHide: false, // Only show on hover
                controlNav: false, // 1,2,3... navigation
                keyboardNav: true, // Use left & right arrows
                pauseOnHover: true, // Stop animation while hovering
                manualAdvance: false, // Force manual transitions
                captionOpacity: 0.85, // Universal caption opacity
                prevText: '<i class="fa fa-arrow-left"></i>', // Prev directionNav text
                nextText: '<i class="fa fa-arrow-right"></i>' // Next directionNav text
        });

	

        /** Superfish *********************************************************/
        'use strict';
        
        if (jQuery().superfish) {
                    jQuery('ul.sf-menu').superfish({
                             autoArrows: true, // arrow mark-up
                             dropShadows: false, // drop shadows                        
                             animationOpen:    {height:'show'},
                             animationClose:    {height:'hide',opacity:'hide'},
                             delay:        200,
                             speed:        200
                    });
        }
        
        jQuery('ul.sf-menu li').hover(
               function(){
                        jQuery(this).addClass('sfHover');
                },
               function(){
                        jQuery(this).removeClass('sfHover');
                }        
        );



        /** Select Menu for smaller screens ***********************************/
        jQuery( ".responsive-menu, .mobile-menu" ).change(
            function() {
                window.location = jQuery(this).find("option:selected").val();
            }
        );


        jQuery(".responsive-menu option, .mobile-menu option").each(function () {
            if (jQuery(this).val() === window.location.toString()) {
                jQuery(this).prop('selected', true);
            }
        });



        /** Disable "unclickable" menu items **********************************/
        jQuery('.mobile-menu .unclickable').attr("disabled", 'disabled');



        /** style select boxes (for responsive menu) **************************/
        jQuery("#skins").selectbox();
        jQuery("#fonts").selectbox();
        jQuery(".responsive-menu").selectbox();



        /** prettyPhoto *******************************************************/
        if (jQuery().prettyPhoto) {
                jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
                        animation_speed: 'fast', // fast/slow/normal 
                        slideshow: 5000, // false OR interval time in ms 
                        autoplay_slideshow: false, // true/false 
                        opacity: 0.90, // Value between 0 and 1 
                        show_title: false, // true/false 
                        allow_resize: true, // Resize the photos bigger than viewport. true/false 
                        default_width: 540,
                        default_height: 540,
                        counter_separator_label: '/', // The separator for the gallery counter 1 "of" 2
                        theme: 'pp_default', // light_rounded / dark_rounded / light_square / dark_square / facebook
                        horizontal_padding: 20, // The padding on each side of the picture 
                        autoplay: true, // Automatically start videos: True/False
                        ie6_fallback: true,
                        social_tools: false
                });
        }


	/**responsive Videos ******************************************************/
	jQuery("#content").fitVids();



        /** Contact form ******************************************************/
        if (jQuery().validate) {		
                jQuery("#contactForm").validate();		
        }
        
        
        
        /** Hide empty span (used for Reply Button in Comments) ***************/
        jQuery('#comments span:empty').remove();
                
        
        
        /** Toggle ************************************************************/	
        jQuery(".toggle_container").hide(); 
        jQuery("h6.trigger").click(function(){
               jQuery(this).toggleClass("active").next().slideToggle("fast");
               return false; //Prevent the browser jump to the link anchor
        });
        
        
        /** Tabs **************************************************************/
        jQuery(".tabs").tabs();

});