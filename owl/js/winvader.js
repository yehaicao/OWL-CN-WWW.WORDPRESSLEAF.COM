jQuery(document).ready(function($) {

	"use strict";
	
	// Search
	
	$('#top-search a.sbutton').on('click', function ( e ) {
		e.preventDefault();
    	$('.show-search-large').slideToggle('fast');
		$('#top-search a.sbutton .fa').toggleClass('fa-search');
		$('#top-search a.sbutton .fa').toggleClass('fa-close');
    });
	// Search
	$( ".show-search input.s" ).focus(function() {
	  $(".show-search").addClass('sfull');
	});
	
	$( ".show-search input.s" ).blur(function() {
	  $(".show-search").removeClass('sfull');
	});
	 
	// Scroll to top
	
	$('.to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	// Owl Carousel (Owl Slider)
		
	$(window).load(function(){ // Prevent the stage height from collapsing: GitHub #251
		$('.owlslider').owlCarousel({
		   items:1,
		   margin:0,
		   loop:true,
		   autoHeight:true,
		   dots: false,
		   nav:true,
		   navText: [
				'<i class="fa fa-long-arrow-left"></i>',
				'<i class="fa fa-long-arrow-right"></i>'
			]
		});
	});	
	
	// grid layout
	
	$(window).load(function(){
		var $container = $('.wi-grid');

		$container.imagesLoaded(function () {
			$container.masonry({
				itemSelector: '.wi-grid li',
				columnWidth: '.wi-grid li',
				gutter: 40
			});
		});
	});
	// masonry layout
	
	$(window).load(function(){

	$('.wi-masonry').isotope({
	  layoutMode: 'moduloColumns',
	  moduloColumns: {
		columnWidth: '.wi-masonry li',
		gutter: 40
	  }
	});
	
	});

	//  Popup for images
 
	if ($.fn.magnificPopup) {
		$('.popup').magnificPopup({
		type: 'image',
		fixedContentPos: false,
			gallery: {
		  enabled: true
		},
		closeBtnInside:true,
		alignTop:false,

		fixedBgPos: false,
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
	}
	
	// Fitvids
	
	$(document).ready(function(){
		$(".container").fitVids(); // Target your .container, .wrapper, .post, etc.
	});
	
	// Menu
	
	$('#navigation .menu').slicknav({
		prependTo:'.menu-mobile',
		label:'',
		allowParentlinks: true,
		openedSymbol:'<i class="fa fa-angle-down"></i>',
		closedSymbol:'<i class="fa fa-angle-right"></i>',
	});
	
	// Slider - alternative slide
	
	$("#owlslider-alternative-slider").owlCarousel({
		loop:true,
		margin:30,
		autoHeight: false,
		dots: true,
		nav:true,
		navText: [
				'<i class="fa fa-long-arrow-left"></i>',
				'<i class="fa fa-long-arrow-right"></i>'
		],
		responsive:{
			0:{
				items:1
			},		
			479:{
				items:1
			},
			568:{
				items:1
			},
			768:{
				items:1
			},
			980:{
				items:1
			},
			1199:{
				items:1
			}
		}	
	});
		
	// Slider - one slide
	
	$("#owlslider-featured-one-slide").owlCarousel({
		loop:true,
		margin:0,
		autoHeight: false,
		dots: true,
		nav:true,
		navText: [
				'<i class="fa fa-long-arrow-left"></i>',
				'<i class="fa fa-long-arrow-right"></i>'
		],
		responsive:{
			0:{
				items:1
			},		
			479:{
				items:1
			},
			568:{
				items:1
			},
			768:{
				items:1
			},
			980:{
				items:1
			},
			1199:{
				items:1
			}
		}	
	});
	
	// Slider - three slides
	
	$("#owlslider-featured-three-slider").owlCarousel({
		loop:true,
		margin:0,
		autoHeight: false,
		dots: true,
		nav:true,
		navText: [
				'<i class="fa fa-long-arrow-left"></i>',
				'<i class="fa fa-long-arrow-right"></i>'
		],
		responsive:{
			0:{
				items:1
			},		
			479:{
				items:1
			},
			568:{
				items:1
			},
			768:{
				items:1
			},
			980:{
				items:2
			},
			1199:{
				items:3
			}
		}	
	});

	
	// Slider - Most Discussed
	
	$("#most-discussed-slider").owlCarousel({
		loop: true,
		margin: 40,
		autoHeight: false,
		dots: true,
		nav: true,
		navText: [
				'<i class="fa fa-long-arrow-left"></i>',
				'<i class="fa fa-long-arrow-right"></i>'
		],
		responsive:{
			0:{
				items:1
			},		
			479:{
				items:1
			},
			568:{
				items:1
			},
			768:{
				items:1
			},
			980:{
				items:2
			},
			1199:{
				items:2
			}
		}	
	});
	
	// Slide Categories List
	
	$('.widget_categories li').hover(function() {
		$(this).children('ul.children').stop(true, true).delay(300).slideDown(400);
	}, function() {
		$(this).children('ul.children').stop(true, true).delay(300).slideUp(400);		
	});
	
	// Menu Child Icon
	
	$(function() {
		// submenu indicator & fade animation
		var icon_dir = 'right';
		//$('#menu-top-menu > li:has(ul) > a').addClass('parent').append('<i class="menu-top-menu-fa-icon fa fa-angle-down"></i>');
		$('#menu-top-menu ul li:has(ul) > a').addClass('parent').append('<i class="menu-top-menu-fa-icon fa fa-angle-' + icon_dir + '"></i>');

	});
	
	// Scroll Button
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 600) {
			$('.to-top').css("opacity", 1);
			$('.to-top').css("bottom", 98);
		} else {
			$('.to-top').css("opacity", 0);
			$('.to-top').css("bottom", -50);
		}
	});
	
	// fixed sidebar

	$(document).ready(function(){
		var $myDiv = $('.sidebar-fixed');

		if ( $myDiv.length){
			$("#sidebar-fixed").jFollowSidebar({
				listen_height : ["#wrapper"],
				container : "#main", 
				stop: 1024
			});
		}
        
    });
	
});
