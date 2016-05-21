(function($) {
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
		prevArrow: '<button type="button" class="slick-prev arrows"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next arrows"><i class="fa fa-chevron-right"></i></button>',
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
	
	
})(jQuery);	


(function($) {
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
		prevArrow: '<button type="button" class="slick-prev arrows"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next arrows"><i class="fa fa-chevron-right"></i></button>',
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					arrows: false,
				}
			}
		],
	});
	
	
})(jQuery);	