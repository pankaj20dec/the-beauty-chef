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
	$('.testimonial-ul').masonry({
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	});
	$('.blog-listing .grid-items').first().css({'marginTop': 135});
	$('.blog-listing').masonry({
	  itemSelector: '.grid-items',
	  columnWidth: '.grid-sizers',
	});
	$('.blog-cat').masonry({
	  itemSelector: '.grid-items',
	  columnWidth: '.grid-sizers',
	});
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
			 0:{
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
	 
	 if($('.testimonial-ul').length){
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
						 $('.loader-img').show();
						  $.ajax({
							url : newTarget,
							type: 'POST',
							dataType: "html",
							error: function(response){
							},
							success: function(response){
								 console.log(response);
								 var result = $('<div />').append(response).find('.testimonial-ul').html();
								$('.testimonial-ul').append(result).hide().fadeIn(400).masonry('reload');
								$('.loader-img').hide();
							}
						});   
						
					}else{
						$('.next-prev').html("<li class='no-more'>no more testimonials</li>");
					}
			});
		}
	}
	
	// Blog 
	 if($('.blog-listing').length){
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
						 $('.loader-img').show();
						  $.ajax({
							url : newTarget,
							type: 'POST',
							dataType: "html",
							error: function(response){
							},
							success: function(response){
								 console.log(response);
								 var result = $('<div />').append(response).find('.blog-listing').html();
								var $tresult = $('.blog-listing').append(result);
								$tresult.imagesLoaded();
								setTimeout(function(){ $tresult.masonry('reload') }, 0);
								$('.loader-img').hide();
							}
						});   
						
					}else{
						$('.next-prev').html("<li class='no-more'>no more blogs</li>");
					}
			});
		}
	}
	
	
	// International Stockists
	 if($('.int-stockists-ul').length){
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
								 var result = $('<div />').append(response).find('.int-stockists-ul').html();
								$('.int-stockists-ul').append(result).hide().fadeIn(300);
							}
						});   
						
					}else{
						$('.next-prev').html("<li class='no-more'>no more stockists</li>");
					}
			});
		}
	}
	
	// category filter load more	
	 if($('.int-stockists-cat-ul').length){
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
								 var result = $('<div />').append(response).find('.int-stockists-cat-ul').html();
								$('.int-stockists-cat-ul').append(result).hide().fadeIn(300);
							}
						});   
						
					}else{
						$('.category-loadmore').html("<p class='no-more'>no more Stockists	</p>");
					}
			});
		}
	 }
	 
	 // category filter load more	
	 if($('.blog-cat').length){
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
								 var result = $('<div />').append(response).find('.blog-cat').html();
								var $tresult = $('.blog-cat').append(result);
								$tresult.imagesLoaded();
								setTimeout(function(){ $tresult.masonry('reload') }, 0);
							}
						});   
						
					}else{
						$('.category-loadmore').html("<p class='no-more'>no more blog	</p>");
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
	 });
	 $('.faq-cat li a').click(function(e){
		  e.preventDefault();
		  var href = $(this).attr('href');
		  var $href = $(href);
		  $(this).parent().addClass('active');
		  $(this).parent().siblings().removeClass('active');
		  $href.prependTo($('.faq-ul')).hide().fadeIn(600);
	 });
	 
	 // Faq Accordion
	 $('.category-posts .ques-ans:nth-of-type(1) .question').find('span').addClass('active');	
	 $('.category-posts .ques-ans .question').click(function(){
		 if($(this).find('span').hasClass('active')){
			$(this).find('span').removeClass('minus active');
			$(this).parent().find('.answer').slideUp(500);
		 }else{
			$(this).siblings().slideDown(500); 
			$(this).find('span').addClass('minus active'); 
			$(this).parent().siblings().find('h6 span').removeClass('minus active');
			$(this).parent().siblings().find('.answer').slideUp(500);
		 }
	 });
	 
});
$(window).load(function(){
	beautyChef.size();
	beautyChef.introSlider();
	
	$('.press-cat li,.int-stockists-categories li').each(function(){
		if(window.location.href.indexOf($(this).find('a').attr('href'))> -1)
		{
			$(this).addClass('active').siblings().removeClass('active');
		}
	});
	$('.category-sidebar li').each(function(){
		//alert(window.location.href.indexOf($(this).find('a').attr('href')));
		if(window.location.href.indexOf($(this).find('a').attr('href')) > -1)
		{
			$(this).addClass('active').siblings().removeClass('active');
		}
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
	
	// Fixed header 
	if($(window).scrollTop() > 0){
		$('header').addClass('fixed');
		$('.site-content-contain').addClass('fixed');
	}else{
		$('header').removeClass('fixed');
		$('.site-content-contain').removeClass('fixed');
	}
});