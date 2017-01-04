var $ = jQuery.noConflict(),wWidth,wHeight,beautyChef;

beautyChef = {
	size: function(){
		wWidth = $(window).width();
		wHeight = $(window).height();
		$('#intro').css({'width': wWidth - 195 });
	},
	introSlider: function(){
		$('.intro-slider').bxSlider({
			auto: true
		});
	}
}
$(document).ready(function(){
	beautyChef.size();
	beautyChef.introSlider();
	$('.top-menu a').click(function(){
		$('.navigation-top').addClass('active');	
	});
	$('.close-menu').click(function(){
		$('.navigation-top').removeClass('active');
	});
	
	$('.products-slider').owlCarousel({
		loop:true,
		nav : true,
		responsive:{
			0:{
				items: 1
			},
			535: {
				items: 2
			},
			768:{
				items: 3
			},
			1300:{
				items: 4
			}
		}
	});
	$('.testimonial-slider').owlCarousel({
		 loop:true,
		 nav:true,
		 autoplay: true,
		 responsive:{
			 1000:{
				 items:1
			 }
		 }
	 });
	 
	 //$('.nf-form-content nf-fields-wrap').find('nf-field').wrapAll('<div class="wrap"></div>');
	 $("nf-fields-wrap nf-field").wrapAll("<div id='accordionBox' />");
	 
});
$(window).load(function(){
	beautyChef.size();
	beautyChef.introSlider();
	
});
$(window).resize(function(){
	beautyChef.size();
	beautyChef.introSlider();
});
// (function($) {
  // $("nf-field:nth-child(1),nf-field:nth-child(2)").wrapAll('<div class="container"></div>');
// })(jQuery);