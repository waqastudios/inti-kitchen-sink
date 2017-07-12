import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';


// Initialize Foundation
$(document).foundation();

// Basic Interface

// Hamburger Menu active state
$(document).on( "opened.zf.offcanvas", function(){
	$('.hamburger').addClass('is-active');
});
$(document).on( "closed.zf.offcanvas", function(){
	$('.hamburger').removeClass('is-active');
});
	

// // scroll to back top button
$(window).scroll(function() {
		var sd = $(window).scrollTop();
		if ( sd > 200 ) 
			$('#inti-scroll-to-top').fadeIn(600);
		else 
			$('#inti-scroll-to-top').fadeOut(400);
});


import slick from 'slick-carousel';


//default example carousel
$('.inti-carousel').slick({
	accessibility: true,
	adaptiveHeight: false,
	autoplay: true,
	autoplaySpeed: 6000,
	arrows: true,
	asNavFor: null,
	centerMode: true,
	centerPadding: '0px',
	cssEase: 'ease',
	dots: false,
	draggable: true,
	fade: false,
	infinite: true,
	initialSlide: 0,
	pauseOnHover: true,
	pauseOnDotsHover: false,
		variableWidth: false,
	slidesToShow: 5, 
	slidesToScroll: 1,
	speed: 600,
	swipe: true,
	// prevArrow: '<button type="button" class="slick-prev arrows"><i class="fa fa-chevron-left"></i></button>',
	// nextArrow: '<button type="button" class="slick-next arrows"><i class="fa fa-chevron-right"></i></button>',
	responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 3, 
			}
		},
		{
			breakpoint: 512,
			settings: {
				arrows: false,
				slidesToShow: 2, 
			}
		}
	],
});


// default example slider
$('.inti-slider').slick({
	accessibility: true,
	adaptiveHeight: false,
	autoplay: true,
	autoplaySpeed: 9000,
	arrows: true,
	asNavFor: null,
	centerMode: true,
	centerPadding: '0px',
	cssEase: 'ease',
	dots: false,
	draggable: true,
	fade: true,
	infinite: true,
	initialSlide: 0,
	pauseOnHover: true,
	pauseOnDotsHover: false,
		variableWidth: false,
	slidesToShow: 1, 
	slidesToScroll: 1,
	speed: 600,
	swipe: true,
	// prevArrow: '<button type="button" class="slick-prev arrows"><i class="fa fa-chevron-left"></i></button>',
	// nextArrow: '<button type="button" class="slick-next arrows"><i class="fa fa-chevron-right"></i></button>',
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				arrows: false,
			}
		}
	],
});

// main slider JS for part-header-slide-hero.php
$('.inti-main-slider').slick({
	accessibility: true,
	adaptiveHeight: false,
	autoplay: true,
	autoplaySpeed: 4000,
	arrows: false,
	asNavFor: null,
	centerMode: true,
	centerPadding: '0px',
	cssEase: 'ease',
	dots: false,
	draggable: true,
	fade: true,
	infinite: true,
	initialSlide: 0,
	pauseOnHover: true,
	pauseOnDotsHover: false,
		variableWidth: false,
	slidesToShow: 1, 
	slidesToScroll: 1,
	speed: 600,
	swipe: true,
	// prevArrow: '<button type="button" class="slick-prev arrows"><i class="fa fa-chevron-left"></i></button>',
	// nextArrow: '<button type="button" class="slick-next arrows"><i class="fa fa-chevron-right"></i></button>',
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				arrows: false,
			}
		}
	],
});

$('.inti-testimonial-widget').slick({
	accessibility: true,
	adaptiveHeight: false,
	autoplay: true,
	autoplaySpeed: 9000,
	arrows: false,
	asNavFor: null,
	centerMode: true,
	centerPadding: '0px',
	cssEase: 'ease',
	dots: true,
	draggable: true,
	fade: true,
	infinite: true,
	initialSlide: 0,
	pauseOnHover: true,
	pauseOnDotsHover: false,
		variableWidth: false,
	slidesToShow: 1, 
	slidesToScroll: 1,
	speed: 600,
	swipe: true,
	// prevArrow: '<button type="button" class="slick-prev arrows"><i class="fa fa-chevron-left"></i></button>',
	// nextArrow: '<button type="button" class="slick-next arrows"><i class="fa fa-chevron-right"></i></button>',
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				arrows: false,
			}
		}
	]
});	