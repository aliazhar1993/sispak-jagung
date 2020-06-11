jQuery(document).ready(function($) {

	'use strict';

		$(".our-listing").owlCarousel({
			items: 4,
			navigation: true,
			navigationText: ["&larr;","&rarr;"],
		});


		$('.flexslider').flexslider({
		    animation: "fade",
		    controlNav: false,
		    prevText: "&larr;",
		    nextText: "&rarr;"
		});


		$('.toggle-menu').click(function(){
	        $('.menu-responsive').slideToggle();
	        return false;
	    });

	// menu now
	function getUrlVars() {
		var vars={};
		var parts=window.location.href.replace(/[?&]+([^&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key]=value;
		})
		return vars;
	}
	var url_act=getUrlVars()["page"];
	if (url_act!=undefined) {
		$(".main-menu ul li.menu-"+url_act).addClass("active");
	} else {
		$(".main-menu ul li.menu-beranda").addClass("active");
	}

});