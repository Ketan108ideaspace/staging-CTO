jQuery(function() {
// aria navigation
    jQuery('.nav, .we-help-list' ).setup_navigation();
// aria navigation  ends
// Font resizing initializer
            jQuery("#textsizer li a").textresizer({
                target: "body",
				sizes: [".875em", "1em", "1.125em", "1.25em", "1.375em", "1.5em", "1.625em", "1.75em", "1.875em"]
            });
// Font resizing initializer ends
	
//Accordion sidebar and inside page	
	
	$('.accordion > li:has(ul)').addClass("sub-item");
	$( ".accordion" ).accordion({
	heightStyle: "content",
	collapsible: true, 
	clearStyle: true,
	active: false
	});
	$( ".content-accordion, .glossary-accordion" ).accordion({
		heightStyle: "content",
		collapsible: true, 
		active: false
	});
	
$(".current-menu-item").parent("li").parent("ul").css("display", "block");	
	$(window).load(function() {
if($(".sub-item ul li a").hasClass("current-menu-item")){
	$(".sub-item ul li a.current-menu-item").parent("li").parent("ul").parent("li").children("a").addClass("ui-accordion-header-active");
	 }
});		
//Accordion sidebar and inside page
	
//Tab Licensing Process
	
$( "#process-tabs" ).tabs({
		       scrollable: true,
        changeOnScroll: false,
        closable: true
		
	});
//Tab Licensing Process ends
	
// tap mobile index inside

$(".tap-button").addClass("show-all");

	$(document).on("click", ".show-all", function(){
	$(".tap-button").removeClass("show-all");
	$(".tap-button").addClass("hide-all");
	$(".index-boxes ul:nth-of-type(1)").removeClass("fixed-height").addClass("auto-height");
	$(".contact-anchor-list").removeClass("fixed-height").addClass("auto-height");
	//alert($(this).text())
	$(this).text(function(){
		return $(this).text().replace("TAP FOR MORE", "TAP FOR LESS");
	});
}); 
	
	$(document).on("click", ".hide-all", function(){
	$(".tap-button").removeClass("hide-all");
	$(".tap-button").addClass("show-all");
	$(".index-boxes ul:nth-of-type(1)").removeClass("auto-height").addClass("fixed-height");
	$(".contact-anchor-list").removeClass("auto-height").addClass("fixed-height");
	//alert($(this).text())
	$(this).text(function(){
		return $(this).text().replace("TAP FOR LESS", "TAP FOR MORE");
	});
});  


// tap mobile index inside ends	
		
//mobile search bar functinality
	
		var _searchBar = jQuery(".search-top");
		var _searchOpenBt = jQuery(".search-open-button");
		var _searchCloseBt = jQuery(".search-close-button");
		var _logoContainer = jQuery(".logo");

	_searchOpenBt.on("click", function(){
	_searchOpenBt.addClass("hidden").removeClass("visible");
	_searchCloseBt.removeClass("hidden").addClass("visible");
	//_searchBar.removeClass("hidden").addClass("visible");
	_logoContainer.addClass("blur").removeClass("unblur");
	_searchBar.addClass("transform");
});
	_searchCloseBt.on("click", function(){
	_searchOpenBt.addClass("visible").removeClass("hidden");
	_searchCloseBt.removeClass("visible").addClass("hidden");
	_logoContainer.removeClass("blur").addClass("unblur") ;
	_searchBar.removeClass("transform");
});	
// mobile menu functioning
    jQuery("a#trigger").on("click", function() {
        jQuery("body").addClass("disabled");
    });
    jQuery("#page").on("click", function() {
        jQuery("body").removeClass("disabled");
    });
// mobile menu functioning ends



// skip content / back to top buttons
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.skip-content').fadeOut();
            jQuery('.back-to-top').fadeIn();

        } else {
            jQuery('.skip-content').fadeIn();
            jQuery('.back-to-top').fadeOut();

        }
    });

	jQuery('.back-to-top').click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
// skip content / back to top buttons ends



// sticky nav functioning for home / inside pages
jQuery('header').css('position', 'fixed').css('z-index', '9');

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 1) {
        jQuery('header').addClass("sticky");
        jQuery('header').css('position', 'fixed');
		jQuery('.admin-bar header').css('position', 'fixed').css('z-index', '9').css('top', 32);

	/*	jQuery('body').css('padding-top', 0);*/
    } else {
        jQuery('header').removeClass("sticky");
        jQuery('header').css('position', 'fixed').css('z-index', '19');
	/*	jQuery('body').css('padding-top', 0);*/
    }
});

var h_header = jQuery("header").height();
var h_header_logged = jQuery("header").height() + 32;
var l_pad = 0;
jQuery('.inside #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header);
jQuery('.inside .admin-bar #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header_logged);
/*jQuery('.inside body').css('padding-top', l_pad);*/
jQuery(window).scroll(function() {
	var h_top = jQuery("#banner").height() - 133;
	var h_top_logged = jQuery("#banner").height() - 165;


	var new_top = h_top ;

    if (jQuery(this).scrollTop() > new_top && screen.width > 767) {
        jQuery('#nav-2').addClass('sticky');
    }
	else if(jQuery(this).scrollTop() > h_top_logged && screen.width > 767){
		jQuery('.admin-bar #nav-2').addClass('sticky');
		}
	else if (jQuery(this).scrollTop() > 0 && screen.width > 767) {
        jQuery('#nav-2').removeClass('sticky');
    }
    if (jQuery(this).scrollTop() > 1 && screen.width > 767) {
        jQuery('.inside #nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').addClass('stickyy');
        jQuery('.inside #nav-2').css('position', 'fixed').css('top',h_header);
		//jQuery('.logged-in #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_top_logged);
		jQuery('.inside .admin-bar #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header_logged);
	/*	jQuery('.inside body').css('padding-top', l_pad);*/

    } else if (jQuery(this).scrollTop() <= 0 && screen.width > 767) {
        jQuery('.inside #nav-2').removeClass('stickyy');
		jQuery('.inside #nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header);
		//jQuery('.logged-in #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_top_logged);
		jQuery('.inside .admin-bar #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header_logged);
		/*jQuery('.inside body').css('padding-top', l_pad);*/

    }

});


jQuery(window).resize(function() {

    if (jQuery(this).scrollTop() > 0 && jQuery(this).width() <= 767 ) {
		jQuery('#nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').removeClass('stickyy');
    }
	var carousel;
	carousel = $("ul.process-tabs-nav");
	if (screen.width <= 767) {
    carousel.itemslide();
	}
	else if (screen.width >= 767){
		carousel.unbind('itemslide');
	}
});
jQuery(document).ready(function() {
    if (jQuery(this).scrollTop() > 0 && jQuery(this).width() <= 767 ) {
		jQuery('#nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').removeClass('stickyy');
    }
	var carousel;
	carousel = $("ul.process-tabs-nav");
	if (screen.width <= 767) {
    
    carousel.itemslide();
	}
	else if (screen.width >= 767) {
		carousel.unbind('itemslide');
	}
});
// sticky nav functioning for home / inside pages ends + mobile swipe tab plugin

});
jQuery(window).load(function() {
	var carousel;
	carousel = $("ul.process-tabs-nav");
	if (screen.width <= 767) {
    
    carousel.itemslide();
	}
	else if (screen.width >= 767) {
		carousel.unbind('itemslide');
	}
});
// window width specific
jQuery(function() {
    if (screen.width < 768) {
	}
	else{

		}
	return false;
});
jQuery(window).load(function() {
    if (screen.width > 768) {
	}
	return false;
});
jQuery(window).resize(function() {
    if (screen.width < 768) {
	}
	return false;
});

jQuery(function() {
    if (screen.width < 767) {
	}
	return false;
});
jQuery(window).load(function() {
    if (screen.width < 767) {

	}
	return false;
});
jQuery(window).resize(function() {
    if (screen.width < 767) {

	}
	return false;
});




// equal heigt container creates

equalheight = function(container) {

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    jQuery(container).each(function() {

        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

// equal heigt container ends



    jQuery(function(){
//anchor link for sticky menu			
        setTimeout(function(){
            var shiftWindow = function() {
                var hash = "#" + location.hash.replace(/[^A-Za-z0-9_\-]/g, "");
                if (hash && jQuery(hash).offset()) {
                    var pos = jQuery(hash).offset().top - 108;
                    jQuery(window).scrollTop(pos);
                }
             };
            if (location.hash) shiftWindow();
            window.addEventListener("hashchange", shiftWindow);
        },10);
//anchor link for sticky menu ends
//popup members

			jQuery(".members-list li a").on("click", function(vl){
				var getAttri_val = jQuery(this).attr("data-name");
				jQuery("#" + getAttri_val).toggleClass("close-popup open-popup");
			  return getAttri_val;
				
			});
	jQuery(".popup-close").on("click", function(e){
			jQuery(this).parent("div").parent("div").toggleClass("open-popup close-popup");
 });	
//popup members			
			
    });


