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
	 
	 if($('.next-prev li a').find('.next-post')){
        //console.log('have next');
         var pageLength = $('.page-numbers li').length;
		 //console.log(pageLength);		
         var pageNum = 2;
             $('.next-post').click(function(e){
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
                            $('.press-ul').append(result);
                        }
                    });   
                    
                }else{
					$('.next-prev').html("<li>no more press</li>");
				}
        });
    }
	 var total = $('.nav-links').find('a').length;
	 console.log(total);
	 
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
	
});
$(window).resize(function(){
	beautyChef.size();
	beautyChef.introSlider();
});
