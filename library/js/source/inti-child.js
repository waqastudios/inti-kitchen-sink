// Basic Interface
(function($) {

	// Hamburger Menu active state
	$('.off-canvas').on( "opened.zf.offcanvas", function(){
		$('.hamburger').addClass('is-active');
	});
	$('.off-canvas').on( "closed.zf.offcanvas", function(){
		$('.hamburger').removeClass('is-active');
	});

	// If using internal page scrolling a lot, activate this
	smoothScroll.init();

	// scroll to back top button
	$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$('#inti-scroll-to-top').css({
					'position': 'absolute',
					'top': sd + $(window).height() - 50
				});
			}
			if ( sd > 200 ) 
				$('#inti-scroll-to-top').fadeIn(600);
			else 
				$('#inti-scroll-to-top').fadeOut(400);
	});

})(jQuery);	

// Carousels
(function($) { 
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
})(jQuery);	