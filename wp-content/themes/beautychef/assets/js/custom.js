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
	 
	 if($('.press-ul').length){
		 if($('.next-prev li a').find('.next-post')){
			//console.log('have next');
			 var pageLength = $('.page-numbers li').length;
			 //console.log(pageLength);		
			 var pageNum = 2;
				 $('.next-prev .next-post').click(function(e){
					 e.preventDefault();
					 var numPlus = pageNum++;
					 if( numPlus <= pageLength){
						 var href = $(this).attr('href');
						 var targetLink = href.split("/");
						// Substring length
						 var tLength = targetLink.length;
						 // change page value
						 targetLink[tLength - 2] = numPlus;
						// New link	with new page
						 var newTarget = targetLink.join('/');
						 console.log('newTarget:'+ newTarget);
						  $.ajax({
							url : newTarget,
							type: 'POST',
							dataType: "html",
							error: function(response){
							},
							success: function(response){
								 console.log(response);
								 var result = $('<div />').append(response).find('.press-ul').html();
								$('.press-ul').append(result).hide().fadeIn(300);
							}
						});   
						
					}else{
						$('.next-prev').html("<li class='no-more'>no more press</li>");
					}
			});
		}
	}
		
	// category filter load more	
	 if($('.press-cat-ul').length){
		  if($('.category-loadmore li a').find('.next-post')){
			 var pageLength = $('.nav-links a').length;
			 console.log(pageLength);		
			 var pageNum = 2;
				 $('.category-loadmore .next-post').click(function(e){
					 e.preventDefault();
					 var numPlus = pageNum++;
					 if( numPlus <= pageLength){
						 var href = $(this).attr('href');
						 var targetLink = href.split("/");
						// Substring length
						 var tLength = targetLink.length;
						 // change page value
						 targetLink[tLength - 2] = numPlus;
						// New link	with new page
						 var newTarget = targetLink.join('/');
						 console.log('newTarget:'+ newTarget);
						  $.ajax({
							url : newTarget,
							type: 'POST',
							dataType: "html",
							error: function(response){
							},
							success: function(response){
								 console.log(response);
								 var result = $('<div />').append(response).find('.press-cat-ul').html();
								$('.press-cat-ul').append(result).hide().fadeIn(300);
							}
						});   
						
					}else{
						$('.category-loadmore').html("<p class='no-more'>no more press</p>");
					}
			});
		}
	 }
	 // Scroll Top click event
	 $('.scroll-top a').click(function(e){
		 e.preventDefault();
		 var body = $('html, body');
		 body.stop().animate({
			 scrollTop: 0
			 }, 500, 'swing');
	 })
});
$(window).load(function(){
	beautyChef.size();
	beautyChef.introSlider();
	
	$('.press-cat li').each(function(){
		if(window.location.href.indexOf($(this).find('a').attr('href'))> -1)
		{
			$(this).addClass('active').siblings().removeClass('active');
		}
	});
	$('.testimonial-ul').masonry({
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	});
});
$(window).resize(function(){
	beautyChef.size();
	beautyChef.introSlider();
});

$(window).scroll(function(){
	var docHeight = $('.site-content-contain').height();
	var sc = $(window).scrollTop() + 300;
	if(sc > docHeight){
		$('.scroll-top').fadeIn();
	}else{
		$('.scroll-top').fadeOut();
	}
});